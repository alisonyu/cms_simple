<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php
include("../controler/logincontroller.php");
//login page
session_start();
if(!is_login())
{
	echo "ERROR:You have not logined";
}
else
{
	echo "<a href='../view/addArticle.html'>添加文章</a>".'</br>';
	echo "<a href='../view/exitlogin.php'>登出</a>";
}
?>