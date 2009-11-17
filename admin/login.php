<?php 
require_once('login.class.php');
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


<form action="login.php?ac=login" method="POST" >
用户名：<input type="text" name="user_name" /><br />
密码：<input type="password" name="user_password" /><br />
<input type="submit" value="登录" />
</form>

</body>
</html>
