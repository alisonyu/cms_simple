<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


<?php
include("addcontroler.php");
?>


<?php
//这里定义格式化textarea和将文章添加到数据库的函数
function format($content)
{
	  $content=str_replace(chr(13),'<br>',$content);
	  $content=str_replace(chr(32),'&nbsp',$content);
	  return $content;
}


function add($title,$content)
{
	 
	$a=new content();
	$a->set_title($title);
	$a->set_text($content);
	$a->AddIntoSQL();
}
?>


<?php
	//这里处理从添加文章网页传来的数据
  $title=$_POST['title'];
  if(empty($title))
  {
	  echo "<script type='text/javascript'>".
			   "alert('the title can not be empty!')"
			   ."</script>";
	 exit();
  }
  $content=$_POST['content'];
  if(empty($content))
  {
	  echo "<script type='text/javascript/'>".
			   "alert('the content can not be empty!')"
			   ."</script>";
	  exit();
  }
  $content=format($content);
  add($title,$content);
?>


