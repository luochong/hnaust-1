<?php
require_once('../include/session.class.php');
?>
<link href="css/stat.css" type=text/css rel=stylesheet />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<div class="RoundedCorner">
  <div class="topname">湖南农业大学学生素拓学分认证管理后台</div>
  <div id="yourname">                             <?php 
  global $p_session;
  $dept_name =current( current($p_session->simpleFetchListA('group_dept',array('dept_name'),array('id'=>$_SESSION['admin_org_code']))));
  echo $dept_name,' 管理员',$_SESSION['admin_user']."：你好！今日是  ";
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
         <a href="body.php" target="main">返回首页</a>
         <a href="modipwd.php" target="main">修改密码</a>
         <a href="login.php?ac=logout" target="_parent">退出系统</a>
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