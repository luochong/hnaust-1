<?php
require_once("../../include/session.class.php");
require_once("syst_adduser.class.php");

$operuser = new operadd();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/stat.css" media="screen" />
<title><?php echo $title;?></title>
<?php
	
if(isset($_POST['submit'])){		
	$operuser->addoper();
}
?>

<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['username'].focus();
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
	/*mail=f1.username.value;
	var mailz = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;  //邮箱正则
	if (!mail.match(mailz)){
     	alert("邮箱地址格式错误或含有非法字符!\n请检查！");
  		f1.username.select();  
  		return false;
    }*/
	if(f1.username.value=="" || checkspace(f1.username.value)){
		alert("请填写登录用户名");
  		f1.username.select();  
  		return false;
	}
	if(f1.userpwd.value=="" || checkspace(f1.userpwd.value)){
		alert("请填写登录密码");
  		f1.userpwd.select();  
  		return false;
	}
}	
</script>
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
      <h3><div class="left">湖南农业大学</div>
	  	  <div class="right"><a href='#'>返 回<暂无链接></a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form id="form1" name="form1" method="post" onsubmit="return checkdata();">
      <div class="alltitle">添加操作员:</div>
		  
	  <div id="allcontent">
        <div class="left">
		  <label>用户名</label> <small>*必须</small><br />
		  <input name="username" type="text" id="username" size="30" /><br />
		  <label>登录密码</label> <small>*必须</small><br />
		  <input name="userpwd" type="password" id="userpwd" size="30" /><br />
		  
		  <br /><label>模块权限</label>	<br />
		  <input type='checkbox' name='modu_item' value='check' checked='checked' />项目管理;
		  <input type='checkbox' name='modu_news' value='check' checked='checked' />新闻管理;
		  <input type='checkbox' name='modu_syst' value='check' checked='checked' />系统管理;
  		  
		  <br />
		  </div>

		  <div class="right">
		         <label>管理部门</label> <small>*必须</small><br />
				 <select name="dept_mname" id="dept_mname" class="dept">    		
		  <?php
		  	$operuser->showDeptList();			
		  ?>   				  
	  	         </select>
		         <br />
			 </div>
			 
			 
			 
		  <div class="clear">&nbsp;</div>
		  
		  <div> 
               <input type="submit" name="submit" value="  添加操作员	 " />
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
