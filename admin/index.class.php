<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南农业大学 后台管理</title>
</head>
<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['opwd'].focus();
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
	
	if(f1.opwd.value=="" || checkspace(f1.opwd.value)){
		alert("请输入旧密码");
  		f1.opwd.select();  
  		return false;
	}
	if(f1.npwd.value=="" || checkspace(f1.npwd.value)){
		alert("请输入新密码");
  		f1.npwd.select();  
  		return false;
	}
	if(f1.npwd1.value=="" || checkspace(f1.npwd1.value)){
		alert("请确认新密码");
  		f1.npwd1.select();  
  		return false;
	}
	if(f1.npwd.value!=f1.npwd1.value){
		alert("新密码两次输入不一致");
  		f1.npwd1.select();  
  		return false;
	}
}	
</script>
<script language="javascript" src="../../js/passwordstrength.js"></script>  <!-- 密码强度验证 易用性 -->
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
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 <form id="form1" name="form1" method="post" action="modipwd.php" onsubmit="return checkdata();">
      <div class="alltitle">修改个人登录密码</div>
		  
	  <div id="allcontent">
	      <div>
		  <label>请输入旧密码</label> <small>*必须</small><br />
          <input name="opwd" type="password" id="opwd" size="40" /><br />
		  <label>请输入新密码</label> <small>*必须</small><br />
		  <input name="npwd" type="password" id="npwd" size="50" onKeyUp="ps.update(this.value);" /><br />
		  <label>密码安全性:	
		  <small id="passwordstrength">
		  <script language="javascript">
		      var ps = new PasswordStrength();
		      ps.setSize("200","20");
		      ps.setMinLength(5);
	      </script>
		  </small>
	      </label>
		  <label>请确认新密码</label> <small>* 密码修改后,请您务必记住</small><br />
          <input name="npwd1" type="password" id="npwd1" size="50" /><br /><br />
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
