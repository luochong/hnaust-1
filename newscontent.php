<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页类
///
///	[Description]
///		学生项目申请首页类页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
require_once("news.class.php");	
$news=new news();
$newsid=$_GET['newsid'];


$newsshow=$news->getnewscont($newsid);
$nshowup=$news->getnewscont($newsid+1);
$nshowdown=$news->getnewscont($newsid-1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>新闻</title>
<body>
<?php
        echo   $newsshow[0][1]; 

       echo   $newsshow[0][2]; 
?>


<?php
       echo   $newsshow[0][3]; 
?>

<?php
       echo   $newsshow[0][4]; 
       echo "<br />";
  
?>
上一篇：<a href="newscontent.php?newsid=<?php echo $nshowup[0][0]  ?>"><?php echo $nshowup[0][1]  ?> </a>
下一篇：<a href="newscontent.php?newsid=<?php echo $nshowdown[0][0]  ?>"><?php echo $nshowdown[0][1]  ?></a>

         
</body>
</html>