<?php
//examine login's information
include("../model/connectdb.php");
include("../controler/logincontroller.php");
$user=$_POST['userid'];
$pw=$_POST['password'];
$conn=connectdb();
$sql="
		select * from usertb
		where userid='{$user}'
		and password='{$pw}'
		";
$result=mysql_query($sql,$conn);
if(!$result)
{
	die(mysql_error());
}
if(mysql_num_rows($result)>0)
{
	echo "{$user} login successfully".'</br>';
	setlogin($user);
	echo "come back to home page in 3 seconds".'</br>';
	echo "<meta http-equiv='refresh' content='3; url=../view/pagecontroller.php?page=1'>";
}
else
{
	echo "login unsuccessfully,please ensure you had inputed the right id or password";
}
mysql_close($conn);
?>