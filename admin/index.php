<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include_once ("../include/session.class.php");
?>
<title><?php echo $title;?></title>
</head>
<frameset rows="82,*" framespacing="0" frameborder="0" border="false" id="frame" scrolling="yes">
  <frame name="topFrame" noresize frameborder="NO" scrolling="NO" marginwidth="0" marginheight="0" src="top.php">
  <frameset framespacing="0" border="false" cols="225,*" frameborder="0" scrolling="yes">
    <frame name="leftFrame" scrolling="auto" marginwidth="0" marginheight="0" src="menu.php">
    <frame name="main" scrolling="AUTO" NORESIZE frameborder="0" marginwidth="10" marginheight="10" border="no" src="body.php">
  </frameset>
</frameset>
<noframes>
  <body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
  <p>你的浏览器版本过低！！！本系统要求IE5及以上版本才能使用本系统。</p>

  </body>
</noframes>
</html>