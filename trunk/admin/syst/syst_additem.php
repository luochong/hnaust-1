<?php
require_once("syst_additem.class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php
	
	
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
	if(f1.dept_mname.value=="0"){
		alert("请选择管理部门");
  		f1.dept_mname.focus();  
  		return false;
	}
}	
</script>
<link href="../css/stat.css" type=text/css rel=stylesheet />
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
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form id="form1" name="form1" method="post" onsubmit="return checkdata();">
      <div class="alltitle">添加项目:</div>
		  
	  <div id="allcontent">
	  	
		
        <div class="left">
          <label>项目类别：</label>
          <select>
          <option name="求真">求真</option>
          <option name="求善">求善</option>
          <option name="求美">求美</option>
          <option name="求实">求实</option>
          <option name="求特">求特</option>
          <option name="求强">求强</option>
          </select><small>*必须</small><br />
		  <label>项目名称：</label> <small>*必须</small><br />
		  <input name="username" type="text" id="username" size="40" /><br />
		  <label>项目编号：</label> <small>*必须</small><br />
		  <input name="userpwd" type="password" id="userpwd" size="20" /><br />
		  <label>项目级别：</label> <small>*必须</small><br />
		  <input name="name" type="text" id="name" size="20" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" />
		  
		  <?php
		  	if( $admin_dept_id == 0 || $admin_type == '2' ){
				if( $admin_type=='2' )$check_s = "checked";else $check_s = "";
		  ?>
		  <div class="block">
		  <input type="checkbox" name="type" value="2" <?php echo $check_s;?> />&nbsp;职能部门管理员
		  </div>
		  <?php
		  	}
		  ?>
		  </div>
		  
		  <div class="clear">&nbsp;</div>
		  
		  <div> 
               <input type="submit" name="submit" value="  添加部门管理员 " />
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
