<?php
//验证登陆信息的账号和密码是否正确
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
	//登陆成功，登记登陆信息
	echo "{$user} login successfully".'</br>';
	setlogin($user);
	echo "come back to home page in 2 seconds".'</br>';
	echo "<meta http-equiv='refresh' content='2; url=../view/pagecontroller.php?page=1'>";
}
else
{
	echo "login unsuccessfully,please ensure you had inputed the right id or password";
}
mysql_close($conn);
?>