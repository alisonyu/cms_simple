<?php
//logincontroller
function setlogin($username)
{
	session_start();
	$_SESSION['login']=$username;
}

function is_login()
{
	return isset($_SESSION['login']);
}

function exit_login()
{
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
	if(is_login())
		return $_SESSION['login'];
	else
		return 0;
}
?>