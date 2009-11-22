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


$studno=$_SESSION["studno"];
$pwdchag=new pwdchg();
$showstudb=$pwdchag->showitem($studno);



?>
 

                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>首页</title>
<link href="login.css" rel="stylesheet" type="text/css">
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
				<li><a class="tit" href="index.php" style="text-decoration:none">退出系统</a></li>
			</ul>
		</div>
		</div>
		<div class="clear"></div>
		<div id="left">
			<div id="left1">
				<div id="denglu">学生登录</div>
				<div id="user_login"><?php
             if(count($showstudb)!==0)
             {
              
                ?>
                  学号：<?php  echo $showstudb[0][1];?>
                  姓名：<?php  echo $showstudb[0][2];?>
                  性别：<?php  echo $showstudb[0][3];?>
                  学院：<?php  echo $showstudb[0][4];?>
                  入学年份：<?php  echo $sshowstudb[0][5];?>
                  班级：<?php  echo $showstudb[0][6];?>
                  申报截止日期：<?php  echo $showstudb[0][7];?>
                     
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
                旧密码：<input type="password" name="oldpwd"><br />
                新密码：<input type="password" name="newpwd"><br />
                确认新密码：<input type="password" name="confpwd"><br />
              <?php 
          
                if($_POST['oldpwd']!==null)
                {
                    if($_POST['oldpwd']!==$showstudb[0][8])
                    echo "原密码错误";
                   elseif($_POST['newpwd']==null)
                    echo "新密码不能为空";
                    
                   elseif(isset($_POST['submit'])||$_POST['newpwd']!==$_POST['confpwd'])
                      echo "密码与确认密码不一致";
                elseif($_POST['oldpwd']!==null||$_POST['newpwd']==$_POST['confpwd']||$_POST['oldpwd']!==$showstudb[0][8])
                {
                    $pwdchag->pwdupdate($studno,$_POST['newpwd']);
                    echo "密码修改成功";
                }  
                 }
                ?>
                <input type="submit"  value="确认">
                
                    </form>
                    

		  </div>
		</div>
	</div>
	<div></div>
</body>

</html>