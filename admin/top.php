<?php
/*@include_once ("include/session.php");
@include_once ("include/config.php");
require_once("function.php");*/
/*$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
mysql_select_db("$dbname");
mysql_query("SET NAMES 'utf8'",$hwnd);
$deptname=deptname($hwnd,$admin_dept_id,$admin_user);
if($_SESSION['login_flag'] == "7"){
	$rebody = "bodysg.php";
}else{
	$rebody = "body.php";
}*/
$admin_name = "邓卓";     //测试
?>
<link href="css/stat.css" type=text/css rel=stylesheet />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<div class="RoundedCorner">
  <div class="topname">湖南农业大学学生素拓学分认证管理后台</div>
  <div id="yourname">                             <?php 
					 	echo $admin_name."：你好！今日是  ";
						$nian=date("Y");
						$yue=date("n");
						$ri=date("j");
						$rq=$nian." - ".$yue." - ".$ri;
						$xq=date("w");
						switch($xq){
							case "0";
								$rq=$rq." 星期日";
								break;
							case "1";
								$rq=$rq." 星期一";
								break;
							case "2";
								$rq=$rq." 星期二";
								break;
							case "3";
								$rq=$rq." 星期三";
								break;
							case "4";
								$rq=$rq." 星期四";
								break;
							case "5";
								$rq=$rq." 星期五";
								break;
							case "6";
								$rq=$rq." 星期六";
								break;
						}
						echo $rq."  ";						
					?>
   </div>
   <div id="toptab">
   <?php
	//if($_SESSION['login_flag'] != "7"){
   ?>
         <a href="call.php" target="main">发布公告</a>
         <a href="call_lword.php" target="main">我要留言</a>
   <?php
 //  }
   ?>
         <a href="<?php //echo $rebody;?>" target="main">返回首页</a>
         <a href="modiedit.php" target="main">修改个人资料</a>
         <a href="modipwd.php" target="main">修改密码</a>
         <a href="logout.php" target="_parent">退出系统</a>
     </ul>
  </div>
<b class="rbottom">
   <b class="r4"></b>
   <b class="r3"></b>
   <b class="r2"></b>
   <b class="r1"></b>
</b>
</div>

</body>