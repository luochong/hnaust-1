<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生密码修改首页
///
///	[Description]
///		学生密码修改页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

require_once("stud_pwdchg.class.php");
require("include/sessionstud.php");
require("include/function.include.php");
require("stud_home.class.php");


$studno=$_SESSION["studno"];
$pwdchag=new pwdchg();
$show=new stud();
$showstudb=$pwdchag->showitem($studno);
$showinfo=$show->showstud($studno);


?>
 

                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>修改密码</title>
<link href="login.css" rel="stylesheet" type="text/css">
<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
</head>

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
				<li><a class="tit" href="index.php?ac=logout" style="text-decoration:none">退出系统</a></li>
			</ul>
		</div>
		</div>
		<div class="clear"></div>
		<div id="left">
			<div id="left1">
				<div id="denglu">学生信息</div>
				<div id="user_login"><?php
             if(count($showstudb)!==0)
             {
              
                ?>学号：<?php  echo $showinfo[0]['stud_no'];?>
                  <br>姓名：<?php  echo $showinfo[0]['stud_name'];?>
                  <br>性别：<?php  echo $showinfo[0]['stud_sex'];?>
                  <br>学院：<?php  echo $showinfo[0]['stud_college'];?>
                  <br>入学年份：<?php  echo $showinfo[0]['stud_grade'];?>
                  <br>班级：<?php  echo $showinfo[0]['stud_class'];?>
                  <br>申报截止日期：<?php  echo $showinfo[0]['stud_deadline'];?>
                     
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
		  		<div id="location">
					<div id="location_tit">所在的位置：修改密码</div>
					<div id="showtime"><?php echo getNowTate()?></div>
				</div>
				<div id="choose">
					<div id="home_display_tit" class="display_c">请输入您的认证信息：</div>
				  <div id="home_display_com">
						<div id="passwordform">
							
			<form method="POST" name="form" style="padding-top:60px" class="zhiti">
                旧&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" name="oldpwd"><br />
                <br>新&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" name="newpwd"><br />
                <br>确认新密码&nbsp;&nbsp;<input type="password" name="confpwd"><br /><br>
                <p class="zhiti2">
              <?php 
          
                if($_POST['oldpwd']!==null)
                {
                    if($_POST['oldpwd']!==$showstudb[0]['stud_password'])
                    echo "原密码错误";
                   elseif($_POST['newpwd']==null)
                    echo "新密码不能为空";
                    
                   elseif($_POST['newpwd']!==null&&$_POST['confpwd']!==null&&$_POST['newpwd']!==$_POST['confpwd'])
                      echo "密码与确认密码不一致";
                elseif($_POST['oldpwd']!==null&&$_POST['newpwd']==$_POST['confpwd']&&$_POST['oldpwd']==$showstudb[0]['stud_password'])
                {
                    $pwdchag->pwdupdate($studno,$_POST['newpwd']);
                    echo "密码修改成功";
                }  
                 }
                ?>
                </p>
                <br><input style="margin-left:37%" type="submit"  value=" 确 认 ">
                
                    </form>
						</div>
					</div>
			 	</div>
		   </div>
		
		   
                    

		 
		</div>
	</div>
</body>

</html>