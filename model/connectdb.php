<?php

 function connectdb()
 {
	 $dbhost="localhost:3306";
     $dbuser="root";
     $dbpass="root";
     $conn=mysql_connect($dbhost,$dbuser,$dbpass);
  if(!$conn)
  {
	 die("the sql can not be connected ".mysql_error());
  }
  mysql_select_db("cms");
  mysql_query("set names utf8"); 
  return $conn;
 }
 
 function connect()
 {
	 $dbhost="localhost:3306";
     $dbuser="root";
     $dbpass="root";
     $conn=mysql_connect($dbhost,$dbuser,$dbpass);
	if(!$conn)
	{
	 die("the sql can not be connected ".mysql_error());
	}
	mysql_query("set names utf8"); 
	return $conn;
 }
 function UpdateSumCol()
 {
	 //这是用来更新contenttb里面的总数的
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
	mysql_close($conn);
 }
 
 function ColPlusOne($conn)
 {
	 
	 $sql="
			SELECT * FROM property
			WHERE name='sumcol'
			";
	$result=mysql_query($sql,$conn);
	if(!$result)
	{
		die(mysql_error());
	}
	$result=mysql_fetch_array($result,MYSQL_ASSOC);
	$result=$result['value'];
	$result++;
	$sql="UPDATE property
			SET value= {$result}
			WHERE name='sumcol' ";
	$t=mysql_query($sql,$conn);
	if(!$t)
	{
		die("update unsuccessfully  ".mysql_error());
	}
	else
		echo "update successfully";
 }
  
?>
