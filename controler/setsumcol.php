<?php
include("../model/connectdb.php");
$conn=connectdb();

$sql="select count(*) from contenttb";

$result=mysql_query($sql,$conn);
if(!$result)
{
	die(mysql_error());
}
$result=mysql_fetch_array($result);
$result=$result[0];
$sql = "UPDATE property
        SET value= {$result}
        WHERE name='sumcol' ";
$k=mysql_query($sql,$conn);
if(!$k)
{
	die(mysql_error());
}
else
	echo "update {$result}";
?>