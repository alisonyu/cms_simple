<?php
include("../model/connectdb.php");
?>
<?php
//initialize usertb
$conn=connectdb();
$sql="
		insert into usertb
		(userid,password)
		values
		('admin','admin')
		";
$result=mysql_query($sql,$conn);
if(!$result)
{
	die(mysql_error());
}
else
{
	echo "initialize  successfully";
}
mysql_close($conn);
?>