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
		ColPlusOne($conn);
		mysql_close($conn);
	}
	
}
?>