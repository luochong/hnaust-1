<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="stylesheet" href="../css/stat.css" media="screen" />


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
	if(f1.name.value=="" || checkspace(f1.name.value)){
		alert("请填写真实姓名");
  		f1.name.select();  
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
      <h3><div class="left"><?php echo $groupname." ".$deptname;?></div>
	  	  <div class="right"><?php echo "<a href='body.php'>返 回</a>";?></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form id="form1" name="form1" method="post" onsubmit="return checkdata();">
      <div class="alltitle">添加管理员账号:</div>
		  
	  <div id="allcontent">
        <div class="left">
		  <label>用户名</label> <small>*必须</small><br />
		  <input name="username" type="text" id="username" size="20" /><br />
		  <label>登录密码</label> <small>*必须</small><br />
		  <input name="userpwd" type="password" id="userpwd" size="20" /><br />
		  <br /><label>模块权限</label>	<br />

		  <input type='checkbox' name='modu_item' value='check' checked='checked' />项目审批;
		  <input type='checkbox' name='modu_news' value='check' checked='checked' />新闻管理;
		  <input type='checkbox' name='modu_syst' value='check' checked='checked' />系统管理;
	  		  		  		  
		  <br />
		  </div>
		  <div class="right">
		         <label>管理部门</label> <small>*必须</small><br />
				 <select name="dept_mname" id="dept_mname" class="dept"> 
				 <option>湖南农业大学信息科学技术学院</option>   		
		  <?php
		/*	$space="";
			if($admin_dept_id!=0){
				$sql="select * from sns_group_dept where id='$admin_dept_id' and dept_unit='$admin_unit'";
				$query=mysql_query($sql,$hwnd);
				$array=mysql_fetch_array($query);
				$value=$array[id]."*".$array[dept_sub];
				echo "<option value='$value' select='selected'>$array[dept_name]</option>";
				$space="&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			else{
				//echo "<option value='0' selected='selected'>系统管理员</option>";
			}
			$sql="select * from sns_group_dept where dept_father_id='$admin_dept_id' and dept_unit='$admin_unit'";
			$query=mysql_query($sql,$hwnd);
			$nums=mysql_num_rows($query);							
			while($array=mysql_fetch_array($query)){
				$value=$array[id]."*".$array[dept_sub];			
				echo "<option value='$value'>$space$array[dept_name]</option>";
				subdept($array[id],$hostname,$dbusername,$dbpassword,$space);
			}		*/		
		  ?>   				  
	  	         </select>
		         <br />
				</div>
		  <div class="clear">&nbsp;</div>
		  
		  <div> 
               <input type="submit" name="submit" value="  添加管理员账号 " />
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