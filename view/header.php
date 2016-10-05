<?php
include("../controler/logincontroller.php");
session_start();
?>
<head>
<title>Alison's PHPLAB</title>
<meta name="description" content="LEARNING PHP"/>
<meta name="keyword" content="learning PHP in action"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="CSS_header.css">

<div id="title">
<a href="pagecontroller.php?page=1" id="homepage" >Alison's PHPLAB</a>
<p id='describe' style='font:16px'>Sometimes you win,sometimes you learn</p>
<?php
	if(!is_login())
	{
	echo "<a href='../view/loginpage.html' id='login'>Login</a>";
	}
	else
	{
	$name=getuser();
	echo "<a href='../view/logined.php' id='login'>{$name}</a>";
	}
	
?>
</div>
</head>