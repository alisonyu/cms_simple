<?php
include("model/connectdb.php");
?>
<?php
$conn=connect();
$create_db = '
					CREATE DATABASE cms
					CHARACTER SET utf8 COLLATE utf8_general_ci
					';
$create_contenttb="
							create table contenttb
							(
							id int(50) not null auto_increment primary key,
							title char(100) not null,
							content text not null,
							EdiTime datetime not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";
$create_commenttb="
							create table commenttb
							(
							ArticleID int not null ,
							name char(100) not null,
							email char(100) not null,
							comment text not null,
							posttime datetime not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";
$create_propertytb="
							create table property
							(
							name char(50) not null,
							value double not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";

$create_usertb="
							create table usertb
							(
							userid char(50) not null,
							password char(50) not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";
$initialize_usertb="
							insert into usertb
							(userid,password)
							values
							('admin','admin')
						  ";

$initialize_property="
							insert into property
							(name,value)
							values
							('sumcol',0)
						  ";

$result=mysql_query($create_db,$conn);
if(!$result) die(mysql_error());
else echo "create db successfully".'</br>';

mysql_select_db("cms");

$result=mysql_query($create_contenttb,$conn);
if(!$result) die(mysql_error());
else echo "create contenttb successfully".'</br>';
							
$result=mysql_query($create_commenttb,$conn);
if(!$result) die(mysql_error());
else echo "create commenttb successfully".'</br>';

$result=mysql_query($create_propertytb,$conn);
if(!$result) die(mysql_error());
else echo "create property successfully".'</br>';						
							
$result=mysql_query($create_usertb,$conn);
if(!$result) die(mysql_error());
else echo "create usertb successfully".'</br>';	

$result=mysql_query($initialize_usertb,$conn);
if(!$result) die(mysql_error());
else echo "initialize usertb successfully".'</br>';

$result=mysql_query($initialize_property,$conn);
if(!$result) die(mysql_error());
else echo "initialize property successfully".'</br>';

echo "initialize successfully";	
?>