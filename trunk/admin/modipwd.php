<?php require_once('login.class.php');
$action = new LoginAction();
$action->run();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南农业大学 后台管理</title>
</head>
<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['oldpwd'].focus();
        return true;
}
function checkspace(checkstr)
{
  var str = '';
  for(i = 0; i < checkstr.length; i++)
  {
    str = str + ' ';
  }
  return (str == checkstr);
} 
function checkdata() {
	var f1 = document.form1;	
	
	if(f1.oldpwd.value=="" || checkspace(f1.oldpwd.value)){
		alert("请输入旧密码");
  		f1.oldpwd.select();  
  		return false;
	}
	if(f1.newpwd.value=="" || checkspace(f1.newpwd.value)){
		alert("请输入新密码");
  		f1.newpwd.select();  
  		return false;
	}
	if(f1.rnewpwd.value=="" || checkspace(f1.rnewpwd.value)){
		alert("请确认新密码");
  		f1.rnewpwd.select();  
  		return false;
	}
	if(f1.newpwd.value!=f1.rnewpwd.value){
		alert("新密码两次输入不一致");
  		f1.rnewpwd.select();  
  		return false;
	}
}	
</script>

<link href="css/stat.css" type=text/css rel=stylesheet />
</head>
<body onLoad="return loadb();">
 <div class="allRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="allbox">
      <h3><div class="left">湖南农业大学 </div>
	  	  <div class="right"></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 <form id="form1" name="form1" method="post" action="modipwd.php?ac=modipwd" onsubmit="return checkdata();">
      <div class="alltitle">修改个人登录密码</div>
		  
	  <div id="allcontent">
	  	<?php echo $action->error_message?>
	      <div>
		  <label>请输入旧密码</label> <small>*必须</small><br />
          <input name="oldpwd" type="password" id="oldpwd" size="40" /><br />
		  <label>请输入新密码</label> <small>*必须</small><br />
		  <input name="newpwd" type="password" id="newpwd" size="50" onKeyUp="ps.update(this.value);" /><br />
		  <label>请确认新密码</label> <small>* 密码修改后,请您务必记住</small><br />
          <input name="rnewpwd" type="password" id="rnewpwd" size="50" /><br /><br />
		  </div>
		  
		  <div> 
            <input type="submit" name="submit" value="  修改个人登录密码 " />
            <input name="id" type="hidden" id="id" value="49" />
		  </div>
	  </div><br />
	  </form>
     </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>



</body>
</html>
