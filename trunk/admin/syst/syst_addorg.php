<?php
require_once("../../include/session.class.php");
require_once("syst_adduser.class.php");
require_once("syst_addorg.class.php");
$operuser = new operadd();
$addorg = new addSchOrg();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php

if(isset($_POST['submit'])){	
	$addorg->add_org();
}
?>
<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['dept_name1'].focus();
        return true;
}
function checkdata() {
	var f1 = document.forms[0];	
	var flag = 1;
	if ( (f1.dept_name1.value == "" || f1.dept_name1.value == " ") && (f1.dept_name2.value == "" || f1.dept_name2.value == " ") && (f1.dept_name3.value == "" || f1.dept_name3.value == " ") && (f1.dept_name4.value == "" || f1.dept_name4.value == " ") && (f1.dept_name5.value == "" || f1.dept_name5.value == " ") ) {
		alert("请至少填写一个部门/机构");
		f1.dept_name1.focus();
		return false;
	}
	if(f1.group.value=="0"){
		alert("请选择集团");
		f1.group.focus();
		return false;
	}
	return true;
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
	  	  <div class="right"><a href='body.php'>返 回[暂未添加链接]</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
      <form id="form1" name="form1" method="post" onSubmit="return checkdata();">
      <div class="alltitle">添加学校机构:</div>
		  
	  <div id="allcontent">
	      <div class="left">
		  
		  <label>选择上级部门/机构:</label><br />
		  <select name="father_id" id="father_id" class="dept">    
		  <option value="">...</option>	    
		  <option value="0"></option>
	      <?php
		  	$operuser->showDeptList();			
		  ?> 
	        </select><br />

		  </div>
		  <div class="right">
		         <label>部门/机构名称[一]：</label><br />
				 <input name="dept_name1" type="text" id="dept_name1" size="50"/><br />
				 <label>部门/机构名称[二]：</label><br />
				 <input name="dept_name2" type="text" id="dept_name2" size="50"/><br />
				 <label>部门/机构名称[三]：</label><br />
				 <input name="dept_name3" type="text" id="dept_name3" size="50"/><br />
				 <label>部门/机构名称[四]：</label><br />
				 <input name="dept_name4" type="text" id="dept_name4" size="50"/><br />
				 <label>部门/机构名称[五]：</label><br />
				 <input name="dept_name5" type="text" id="dept_name5" size="50"/><br />
		  </div>
		  <div class="clear">&nbsp;</div>
		  
		  <div> 
	       <input type="submit" name="submit" value=" 添加部门/机构 " />
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
