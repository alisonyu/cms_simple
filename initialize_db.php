<?php
include("model/connectdb.php");
?>
<?php
$db_name='cms'; //要与../model/connectdb.php里的connectdb()函数定义的db_name要一致。
$conn=connect();
//创建内容管理系统的数据库
$create_db = "
					CREATE DATABASE {$db_name}
					CHARACTER SET utf8 COLLATE utf8_general_ci
					";
//这是用来存储文章内容的表，由主键id，标题，内容以及发表时间组成
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
//这是用来存储评论的表，由文章ID(作为索引)，评论者名称，邮件，评论内容，发表时间组成
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
//存储系统的一些属性，目前只有一个属性是contenttb的总列数，用于计算分页的总页数。
$create_propertytb="
							create table property
							(
							name char(50) not null,
							value double not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";
//存储用户的相关信息
$create_usertb="
							create table usertb
							(
							userid char(50) not null,
							password char(50) not null
							)
							CHARACTER SET utf8 COLLATE utf8_general_ci
							";
//初始化用户表，插入admin
$initialize_usertb="
							insert into usertb
							(userid,password)
							values
							('admin','admin')
						  ";
//初始化属性表
$initialize_property="
							insert into property
							(name,value)
							values
							('sumcol',1)
						  ";
						  
$t=date("Y-m-d G:i:s");
$initialize_conttenttb="INSERT INTO contenttb ".
								"(id,title,content,EdiTime) ".
								"VALUES ".
								"(NULL,\"welcome\",\"Hello cms\",\"{$t}\")";

	   
$result=mysql_query($create_db,$conn);
if(!$result) die(mysql_error());
else echo "create db successfully".'</br>';

mysql_select_db("{$db_name}");

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

$result=mysql_query($initialize_contenttb,$conn);
if(!$result) die(mysql_error());
else echo "initialize property successfully".'</br>';

echo "initialize successfully".'</br>';

echo "come back to home page in 2 seconds".'</br>';
echo "<meta http-equiv='refresh' content='2; url=../view/pagecontroller.php?page=1'>";	
?>