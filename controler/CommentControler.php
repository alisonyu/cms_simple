<?php
function comment_show($conn,$id)
{
	//此函数的作用是显示评论
	//这里需要传入一个连接数据库后返回的变量是为了避免重复连接
	$sql="
			select * from commenttb
			where ArticleID ={$id}
			order by posttime desc
			";
	$result=mysql_query($sql,$conn);
	if(mysql_num_rows($result)==0)
	{
		echo "目前还没有人评论".'</br>';
	}
	else
	{	echo"<div id=comment>";
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
		{
			echo"<div class='comm'>";
			echo"<p class=name>"."<font>评论者</font>"."{$row['name']}"."</p>";
			echo"<p class=time>"."<font>发表时间</font>"."{$row['posttime']}"."</p>";
			echo"<p class=text>"."{$row['comment']}"."</p>"."</br>";
			echo"</div>";
			echo "<HR style=\"width='50%'  align='left'  \">";
		}
		echo"</div>";
	}
}

function comment_add($conn,$id,$name,$comment,$email)
{
	//添加评论
	if(!$conn)
	{
		echo "connect error";
		return;
	}
	$time=date("Y-m-d G:i:s");
	$sql="
			insert into commenttb 
			(ArticleID,name,email,comment,posttime)
			values
			({$id},\"{$name}\",\"{$email}\",\"${comment}\",\"{$time}\")
			";
	$result=mysql_query($sql,$conn);
	if(!$result)
	{
		die("add comment unseccessfully   ".mysql_error());
	}
	else
		echo "add comment successfully";
}

function comment_board($id)
{
	//生成评论板
	echo "
			<head>
			<link rel=\"stylesheet\" type=\"text/css\" href=\"..\view\css_comm.css\" />
			<meta http-equiv=\"Content-Type\" cont ent=\"text/html;charset=utf-8\"/>
			</head>
			<form action=\"../model/comment.php\" method=\"POST\">
			<font>姓名</font></br>
			<input type=\"text\" name=\"username\" class='form-control '>
			</br></br>
			<font>邮箱</font></br>
			<input type=\"text\" name=\"email\" class='form-control '>
			</br></br>
			<font>评论内容</font></br>
			<textarea name=\"comment\" rows=\"20\" cols=\"80\" class='form-control '>
			</textarea>
			</br>
			</br>
			<input type='hidden' name='id' value={$id}>
			<input type=\"submit\" value=\"Submit\">
			</form>
			";
} 
?>
