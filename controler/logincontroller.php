<?php
//logincontroller
function setlogin($username)
{
	//登记登陆信息，启用session
	session_start();
	$_SESSION['login']=$username;
}

function is_login()
{
	//返回是否登陆，若登陆返回1，否则放回0
	return isset($_SESSION['login']);
}

function exit_login()
{
	//退出登录，若成功退出返回1，失败返回0
	if(is_login())
	{
		$_SESSION=array();
		session_destroy();
		return 1;
	}
	else
		return 0;
}

function getuser()
{
	//获取登录者的账号信息，若成功返回账号，不成功返回0
	if(is_login())
		return $_SESSION['login'];
	else
		return 0;
}
?>