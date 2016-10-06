<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php
include("header.php");
include("../model/connectdb.php");
include("../controler/CommentControler.php");
?>

<?php
// 显示文章的主要内容
//	通过提交过来的表单数据来提取数据库相应索引的文件,用来显示特定页面的内容
$id=$_GET['id'];
$conn=connectdb();
$sql="SELECT *
		  FROM contenttb
		  where id=\"{$id}\"";
$result=mysql_query($sql,$conn);
if(!$result)
{
	die("get result unsuccessfully  ".mysql_error());
}
$row=mysql_fetch_array($result,MYSQL_ASSOC);
$title=$row["title"];
$content=$row["content"];
//mysql_close($conn);
?>

<?php
echo "<body style=\"background-color:'#FAFBFB' \">";
echo "<h1>"."{$title}"."</h1>".'</br>';
echo  "<p style=\"font-family: 'Arial','Microsoft YaHei','黑体','宋体',sans-serif;\">"."{$content}"."</p>".'</br>';
echo "</body>";
echo "</br>";
echo "<HR>";
echo "<h1>评论区</h1>";
//显示评论区
comment_show($conn,$id);
//显示评论板
comment_board($id);
mysql_close($conn);

?>
