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
require("stud_home.class.php");
//echo $_SESSION["studno"];
$studno=$_SESSION["studno"];
$show=new stud();
$showinfo=$show->showstud($studno);

$itype=$_GET['itype'];
$icode=$_GET['icode'];
$_SESSION['itype']=$itype;
$_SESSION['icode']=$icode;
$stuno=$_SESSION["studno"];

$studcode=$_SESSION["studcode"];

$citem=new selitem();
$showitem=$citem->seltype($itype);


?>



          
                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>首页</title>
<link href="login.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" src="include/jquery.js"></script>
 <script type="text/javascript" src="include/thickbox.js"></script>
 

 <link rel="stylesheet" href="include/thickbox.css" type="text/css" media="screen" />
<body>
<div id="background">
		<div id="headimg">
		<div id="header"></div>
		<div id="title">
			<ul>
					<li><a class="tit" href="stud_home.php" style="text-decoration:none">首&nbsp;页</a></li>
				<li><a class="tit" href="stud_addapp.php" style="text-decoration:none">项目申报</a></li>
				<li><a class="tit" href="#" style="text-decoration:none">资料下载</a></li>
				<li><a class="tit" href="stud_pwdchg.php" style="text-decoration:none">修改密码</a></li>
			<li><a class="tit" href="index.php" style="text-decoration:none">退出系统</a></li>
			</ul>
		</div>
		</div>
		<div class="clear"></div>
		<div id="left">
			<div id="left1">
				<div id="denglu">学生登录</div>
				<div id="user_login"><?php
             if(count($showinfo)!==0)
             {
              
                ?>学号：<?php  echo $showinfo[0][1];?>
                  姓名：<?php  echo $showinfo[0][2];?>
                  性别：<?php  echo $showinfo[0][3];?>
                  学院：<?php  echo $showinfo[0][4];?>
                  入学年份：<?php  echo $showinfo[0][5];?>
                  班级：<?php  echo $showinfo[0][6];?>
                  申报截止日期：<?php  echo $showinfo[0][7];?>
                     
          <?php    
             } 
           
?>
				</div>
			</div>
			<div id="left2">
				<div id="left_info_title">通知</div>
				<div id="left_inform"><MARQUEE onmouseover=this.stop(); onmouseout=this.start(); direction=up height=140 width=150 		scrollAmount=1 scrollDelay=1><a class='info' href='#' title='关于...的通知1'>关于...................的通知1</a><br><br><a class='info' href='#' title='关于...的通知2'>关于..................的通知2</a><br><br><a class='info' href='#' title='关于...的通知3'>关于..................的通知3</a><br><br><a class="info" style="text-decoration:none" href='#' title='关于...的通知4'>关于................的通知4</a><br><br><a class='info' href='#' title='关于...的通知5'>关于..................的通知5</a><br><br><a class='info' href='#' title='关于...的通知6'>关于........................的通知6</a></MARQUEE></div>
				<div id="more"><a class="info" style="text-decoration:none" href="#">more>></a></div>
			</div>
		</div>
		<div id="right">
		  <div id="item">
		  
		    <form method="POST" name="form">
                    <select name="itype" id="itype" onchange="location.href='stud_addapp.php?'+'itype='+this.options[this.selectedIndex].value;">
                    <option value="0">请选择</option>
                         <option value="1" <?php if($_GET['itype']=="1"){?> selected="selected"<?php }?>>求真 </option>
                        <option value="2"  <?php if($_GET['itype']=="2"){?> selected="selected"<?php }?>>求善 </option>
                        <option value="3"  <?php if($_GET['itype']=="3"){?> selected="selected"<?php }?>>求美 </option>
                        <option value="4"  <?php if($_GET['itype']=="4"){?> selected="selected"<?php }?>>求实 </option>
                        <option value="5"  <?php if($_GET['itype']=="5"){?> selected="selected"<?php }?>>求特 </option>
                        <option value="6"  <?php if($_GET['itype']=="6"){?> selected="selected"<?php }?>>求强 </option>
                    </select>
                    <select name="iname" id="iname"  onchange="location.href='<?php echo $_SERVER["REQUEST_URI"];?>&'+'icode='+this.options[this.selectedIndex].value;"  >
                    <option value="0">请选择</option>
                   <?php  
              
                    for($i=0;$i<count($showitem);$i++)
                    {
                   //  print_r($showitem);
                   ?> <option value="<?php echo $showitem[$i][1];?>" <?php if($_GET['icode']== $showitem[$i][1]){?> selected="selected"<?php }?> ><?php
                      echo $showitem[$i][0];  
                      ?>    </option>
                    <?php 
                    } 
                    ?>
                
                    </select>
                    
                     
                    <a href="stud_confaddapp.php?keepThis=true&TB_iframe=true&height=300&width=500" title="确认提交申请" class="thickbox" ;><input type="submit" value="提交"></a>
                    </form>
                    

		  </div>
		</div>
	</div>
	<div></div>
</body>

</html>
