<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		索引首页
///
///	[Description]
///		索引首页页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

?>

<?php 
require_once("index.class.php");
$action = new LoginAction();
$action->run();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统登录</title>
</head>
<body>

<?php echo $action->error_message;?>


<form action="index.php?ac=login" method="POST" >
用户名：<input type="text" name="user_name" /><br />
密码：<input type="password" name="user_password" /><br />
<input type="submit" value="登录" />
</form>

</body>
</html>





