<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE,'——',$title ?></title>
<link rel="stylesheet" type="text/css" href="stat.css">
<!--[if IE 5]>
<style type="text/css"> 
/* 将 IE 5* 的 css 方块模型修正放在这个条件注释中 */

</style>
<![endif]--><!--[if IE]>
<style type="text/css"> 
/* 请将所有版本的 IE 的 css 修复放在这个条件注释中 */
.thrColFixHdr #mainContent .newscontent ul,.notice ul{
	line-height:22px;
}


/* 上面的专用 zoom 属性为 IE 提供避免错误所需的 hasLayout */
</style>
<![endif]-->

<script type="text/javascript" src="<?php echo APP_ROOT?>/include/jquery.js"></script>

</head>

<body class="thrColFixHdr">

<div id="container">
  <div id="header">
   <div style="margin-bottom:0px;float:left;" >	<img src="images/st_02.jpg"  /></div>
  <div style="margin-top:0px;float:left;" ><EMBED height=92 pluginspage= http://www.macromedia.com/go/getflashplayer src="images/headflash.swf" type=application/x-shockwave-flash width=625 wmode="transparent" quality="high"></EMBED>
  </div>
  	<div id="navleft"></div>
    <div id="nav">
        <ul>
                <li style="border-left:none"><a href="index.php">首&nbsp;页</a></li>
                <li><a href="newstitle.php">新闻中心</a></li>
                <li><a href="download.php">资料下载</a></li>
                <li><a href="stud_home.php">项目申报</a></li>
                <li><a href="http://www.xnqn.com" target="_blank">湘农青年</a></li>
        </ul>    
    </div>
    <div id="navright"></div>   
  
  <!-- end #header --></div>

  <div class="huise">
  <?php if(isset($_SESSION['studno'])){ 
      echo '<p class="toppp"><span>所在的位置：',$title,'</span><span class="sname">',$_SESSION["studname"],'，你好！&nbsp;&nbsp;<a href="stud_pwdchg.php">修改密码</a>&nbsp;<a href="index.php?ac=logout">退出</a>','</span></p>'; 
  ?>
  
  
 
  <?php
  
  
  }else{
   ?>
  <form method="POST" action="index.php?ac=login" method="POST">用户名:
			<input type="text" size="16" name="user_name" id="user_name"  />&nbsp;&nbsp;密码:
		      <input name="user_password" size="16" type="password"/>&nbsp;&nbsp;&nbsp;<input type="submit" value="登录" /></form>
	<?php } ?>
		      
   </div>