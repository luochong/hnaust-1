<?php
require_once("syst_editorg.class.php");

$editorg = new editorg();
$array_dept = $editorg->orgedit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php

if(isset($_POST['submit'])){			

	
	if($ret){  
		echo "<script language=javascript>\n";	
		echo "alert('成功修改部门')\n";
		echo "window.location.href='grouAdm02.php?gid=$gid&ye=$ye'";		
		echo "</script>\n";
	}
	else{
		echo "fail";
	}
	
}
?>
<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['dept_name1'].focus();
        return true;
}
function checkdata() {
	var f1 = document.form1;	
	var flag = 1;
	if ( (f1.dept_name1.value == "" || f1.dept_name1.value == " ") ) {
		flag=0;
	}
	if(!flag){
		alert("请填写部门/机构");
		document.form1.dept_name1.focus();
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
	  	  <div class="right"><a href='deptgl.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
      <form id="form1" name="form1" method="post" onSubmit="return checkdata();">
      <div class="alltitle">修改部门/机构:</div>
		  
	  <div id="allcontent">
	      <div class="left">
		  <label>上级部门/机构:</label>
		  <br />
		  <?php
		  echo $array_dept[0]["dept_father_name"];
		  ?>
		  <br />

		  </div>
		  <div class="right">
		         <label>部门/机构名称：</label>
		         <br />
				 <input name="dept_name1" type="text" id="dept_name1" size="40" value="<?php echo $array_dept[0]['dept_name'];?>"/><br />
				 <label></label>
				 <br />
		  </div>
		  <div class="clear">&nbsp;</div>
		  
	    <div> 
	       <input type="submit" name="submit" value=" 修改部门/机构 " />
		   <input type="hidden" name="id" value="<?php //echo //$dept_array[0][id];?>"/>
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
