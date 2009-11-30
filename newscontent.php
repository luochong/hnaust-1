<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页类
///
///	[Description]
///		学生项目申请首页类页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
require_once("news.class.php");	
$news=new news();
$newsid=$_GET['newsid'];


$newsshow=$news->getnewscont($newsid);
$nshowup=$news->getnewscont($newsid+1);
$nshowdown=$news->getnewscont($newsid-1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>项目申报</title>
<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
<link href="login.css" rel="stylesheet" type="text/css"/>

</head>
<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/thickbox.js"></script>
<body>
<div id="background">
<div id="headimg">
			<div id="header"></div>
			<div id="header1">
				<div id="header_bg"></div>
				<div id="header_bg1"></div>
				<div id="header_bg2">
				<li><a class="tit" href="stud_home.php" style="text-decoration:none">首页</a></li>
				<li><a class="tit" href="stud_addapp.php" style="text-decoration:none">项目申报</a></li>
				<li><a class="tit" href="#" style="text-decoration:none">资料下载</a></li>
				<li><a class="tit" href="stud_pwdchg.php" style="text-decoration:none">修改密码</a></li>
				<li><a class="tit" href="index.php?ac=logout" style="text-decoration:none">退出系统</a></li>
				<li><a class="tit" href="http:\\www.xnqn.com" target="_blank" style="text-decoration:none">湘农青年</a></li>
				</div>
				<div id="header_bg3"></div>
			</div>
			<div id="header_bg4"></div>
		</div>
		<div id="right">
		  <div id="item">
		  		<div id="location">
					<div id="location_tit">新闻中心</div>
					<div id="showtime"><?php echo getNowTate()?></div>
				</div>

  <font size="3"><?php  echo   $newsshow[0]['news_title']; ?></font><br />
              <font size="2"><?php echo   $newsshow[0]['news_time']; ?></font>
              <font size="2"><?php echo   $newsshow[0]['news_author']; ?></font><br />
              <font size="2"><?php  echo   $newsshow[0]['news_body']; ?></font>

       </div>
		</div>
	</div>
</body>

</html>
            





         
