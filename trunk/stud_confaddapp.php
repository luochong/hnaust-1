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
require("include/sessionstud.php");
require_once("stud_addapp.class.php");

$citem=new selitem();
$itype=$_SESSION['itype'];
$icode=$_SESSION['icode'];
$stuno=$_SESSION["studno"];
$studcode=$_SESSION["studcode"];

$showitem=$citem->finditem($icode);
if($_POST['submit']){
$citem->insertapp($itype,$iname,$studno,$studcode);  //写入表
echo "<script language=javascript >\n";	
			echo "alert('提交成功')\n";
			echo "history.go(-2)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
</head>
<body>
 <form method="POST">
<?php    switch ($itype)
               {
                 	case '1':$ttype="真";break;
                  	case '2':$ttype="善";break;
             	    case '3':$ttype="美";break;
       	            case '6':$ttype="强";break;
               }
               echo $ttype;
             
             echo $showitem[0][3] ;
              
?>
<input type="submit" name="submit">
</form>


</body>
</html>