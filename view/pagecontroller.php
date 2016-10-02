<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php
//这个是用来处理页面显示（目录列表），分页等功能
?>
<?php
include("header.html");
include("../model/connectdb.php");
?>

<?php
//这是获取页数的相关函数
function GetPage($pages)
{
	$conn=connectdb();
	$pages=($pages-1)*10;
	$sql="SELECT * from contenttb
			 ORDER BY EdiTime DESC
			 LIMIT  {$pages},10
";
$result=mysql_query($sql,$conn);
if(!$result)
{
	die(mysql_error());
}
mysql_close($conn);
return $result;
}

function GetNowPage()
{
	try
	{
	$nowpage=$_GET['page'];
	}
	catch(Exception $e) 
	{
	$nowpage=1;
	}
	if($nowpage==0) 
	$nowpage=$nowpage+1;
	return $nowpage;
}

function GetSumPage()
{
	$conn=connectdb();
	$sql="
			SELECT * FROM property
			WHERE name='sumcol'
			";
	$result=mysql_query($sql,$conn);
	if(!$result)
	{
		die(mysql_error());
	}
	$result=mysql_fetch_array($result,MYSQL_ASSOC);
	$result=$result['value'];
	if($result%10) return $result/10+1;
	else return$result/10;
}

function GetMaxPage($nowpage,$sumpage)
{
	if($nowpage+5>$sumpage) return $sumpage;
	else return $nowpage+5;
}

function GetMinPage($nowpage)
{
	if($nowpage-5<1) return 1;
	else return $nowpage-5;
}


//分页函数
function DifPage($nowpage,$minpage,$maxpage,$sumpage)
{
	for($i=$minpage;$i<=$maxpage;$i++)
	{
		if($i==$nowpage)
		{
			echo "<a href='pagecontroller.php?page={$i}' class='difpage' style='color:red;'>{$i}</a>&nbsp&nbsp";
		}
		else 
			echo "<a href='pagecontroller.php?page={$i}' class='difpage'>{$i}</a>&nbsp&nbsp";
	}
}
?>

<?php
//这里是设置分页的一些信息
$sumpage=GetSumPage();
$nowpage=GetNowPage();
$minpage=GetMinPage($nowpage);
$maxpage=GetMaxPage($nowpage,$sumpage);
?>

<?php
$result=GetPage($nowpage);
$t=1;
echo "<div style=\"background-color:'#FAFBFB' \">";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
	$describe=mb_substr($row["content"],0,200,'utf-8');
	echo "<div id=content\"{$t}\">";
	echo"<a href='caogao.php?id={$row["id"]}'>"."{$row["title"]}"."</a>";
	echo"</br>";
	echo"<p class=describe>"."{$describe}"."</p>";
	echo "</div>";
	echo "<HR>";
}

$t=1;
DifPage($nowpage,$minpage,$maxpage,$sumpage);
echo "</div>";
?>




