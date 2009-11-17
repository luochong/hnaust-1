<?php 
require_once('login.class.php');
$action = new LoginAction();
$action->run();
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南农业大学素质拓展学分认证系统 后台管理</title>
<link href="css/stat.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['user_name'].focus();
        return true;
}
function checkData() {
	var f1 = document.form1;
	var wm = "您有如下项目没有填写正确：\n";
	var noerror = 0;
	

	var t1 = f1.user_name;
	if (t1.value == "" || t1.value == " ") {
		wm += " ※ 登陆帐号\r\n";
		noerror=1;
	}

	var t1 = f1.user_password;
	if (t1.value == "" || t1.value == " ") {
		wm += " ※ 登陆密码\r\n";
		noerror+=2;
	}
	
	if (noerror != 0) {
		alert(wm);
		if (noerror==1 || noerror==3){
			document.form1.user_name.focus();
		}
		if (noerror==2){
			document.form1.user_password.focus();
		}
		return false;
	}
	else
	{
		
		if(f1.yzm.value=="" || f1.yzm.value==" "){
			alert("请填写验证码");
			document.form1.yzm.focus();
			return false;
		}else{
			return true;
		}
		
		
	}
}
</script>
</head>
<body id="login" onLoad="return loadb();">
<div class="box">
<div class="bg">
    <div class="clear">&nbsp;</div>
	<div class="denglu">
	<p style="color:#FF0000"><?php echo $action->error_message ?></p>
	<form id="form1" name="form1" method="post" action="login.php?ac=login" onSubmit="return checkData();">  
	  管理员账号：<input class="long" type="text" name="user_name" value="<?php echo $_POST['user_name']?>" /><br /><br />
	  管理员密码：<input class="long"  type="password" name="user_password" value="<?php echo $_POST['user_password']?>" />
	  <br /><br />
	  登录验证码：<img src='../yzm/yzm.php' alt='验证码' /><br /><br />
	  输入验证码：<input class="short"  type="text" name="yzm" />&nbsp;
	  <br /><br />
	 <div class="input">
	  	<input type="submit" src="images/loginok.gif" name="submit" value=" 提 交 " />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" src="images/loginre.gif" name="submit1" value=" 重 置 " />	
	</div>
	</form>
	</div>
</div>	
</div>
  

  <!--google  analytics code end-->
  
</body>
</html>
