<?php
include("../model/connectdb.php");
$conn=connectdb();
$sql="
		create table commenttb
		(
		ArticleID int not null,
		name char(50) not null,
		email char(50) not null,
		comment varchar(300) not null,
		posttime datetime not null
		)
		";
$result=mysql_query($sql,$conn);
if(!$result)
{
	die(mysql_error());
}
else
{
	echo "create commenttb successfully";
}
mysql_close($conn);
?>