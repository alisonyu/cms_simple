<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php
include("../controler/logincontroller.php");
session_start();
if(exit_login())
{
	echo "exit login successfully".'</br>';
	echo "come back to home page in 3 seconds".'</br>';
	echo "<meta http-equiv='refresh' content='3; url=../view/pagecontroller.php?page=1'>";
}
else
{
	echo "there are something wrong in exiting login";
	
}
?>