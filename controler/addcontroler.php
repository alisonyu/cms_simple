<?php
include("../model/connectdb.php");
?>

<?php

class content
{
	var $title;
    var $text;
	
	function set_title($name)
	{
		return $this->title=$name;
	}
	
	function set_text($s)
	{
		return $this->text=$s;
	}
	
	function AddIntoSQL()
	{
		//将文章添加到数据库
		$conn=connectdb();
		$t=date("Y-m-d G:i:s");
		$f=$this->title;
		$sql="INSERT INTO contenttb ".
       "(id,title,content,EdiTime) ".
       "VALUES ".
       "(NULL,\"{$this->title}\",\"{$this->text}\",\"{$t}\")";
		$result=mysql_query($sql,$conn);
		if(!$result)
		{
			die("add wrongly   ".mysql_error());
		}
		else
			echo "add into sql successfully".'</br>';
		//当添加文章成功的时候，文章数加1，更新到property表的sumcol里面，用于计算分页。
		ColPlusOne($conn);
		echo "come back to home page in 2 seconds".'</br>';
		echo "<meta http-equiv='refresh' content='2; url=../view/pagecontroller.php?page=1'>";
		mysql_close($conn);
	}
	
}
?>