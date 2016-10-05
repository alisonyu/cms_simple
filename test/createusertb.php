<?php
//create user table
include("../model/connectdb.php");
$conn=connectdb();
$sql="
		create table usertb
		(
		userid int not null,
		password char(50) not null
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