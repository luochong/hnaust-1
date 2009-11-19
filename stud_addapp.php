<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请页面
///
///	[Description]
///		学生项目申请申请页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
// header('Content-Type:   text/html;   charset=utf-8');

require("stud_addapp.class.php");

$itype=$_GET['itype'];

$citem=new selitem();
$showitem=$citem->seltype($itype);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
</head>
<body>
                    <select name="itype" id="itype" onchange="location.href='stud_addapp.php?'+'itype='+this.options[this.selectedIndex].value;">
                    <option value="0">请选择</option>
                         <option value="1" <?php if($_GET['itype']=="1"){?> selected="selected"<?php }?>>真 </option>
                        <option value="2"  <?php if($_GET['itype']=="2"){?> selected="selected"<?php }?>>善 </option>
                        <option value="3"  <?php if($_GET['itype']=="3"){?> selected="selected"<?php }?>>美 </option>
                        <option value="4"  <?php if($_GET['itype']=="4"){?> selected="selected"<?php }?>>实 </option>
                        <option value="5"  <?php if($_GET['itype']=="5"){?> selected="selected"<?php }?>>特 </option>
                        <option value="6"  <?php if($_GET['itype']=="6"){?> selected="selected"<?php }?>>强 </option>
                    </select>
                    <select name="item" id="item">
                    <option><?php  
              
                    for($i=0;$i<count($showitem);$i++)
                    {
                   //  print_r($showitem);
                      echo $showitem[0][$i];   
                    }
                   
                    ?>
                                               </option>
                    
                    </select>
</body>
</html>