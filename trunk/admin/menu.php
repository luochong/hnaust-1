<?php
include_once ("../include/session.class.php");
$user_modu_data  = $_SESSION['admin_limt'];
$modu_item = substr($user_modu_data,0,1);
$modu_news = substr($user_modu_data,1,1);
$modu_syst = substr($user_modu_data,2,1);
?>

<script type="text/javascript">
function $(_sId){
	return document.getElementById(_sId);
}
function hide(_sId){
	$(_sId).style.display = $(_sId).style.display == "none" ? "" : "none";
}
</script>
<link rel="stylesheet" href="css/stat.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="leftRoundedCorner">
    <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
   </b>
   <div id="leftmenu">

	<?php
	
	for($i=1;$i<=1;$i++)
	{
		if( $modu_item == "0" )break;
	?>	
	<div class="hand" onclick="hide('hideMenuFunc6')">项目管理</div>
	  <div id="hideMenuFunc6">
	       <div><a href="item/itemlist.php" target="main">项目列表</a></div>
	  	  <div><a href="stud/stud_dangmgf.php" target="main">添加项目</a></div>
		  <div><a href="stud/stud_reward.php" target="main">审核项目</a></div>
		  <div><a href="stud/stud_punish.php" target="main">查询项目</a></div>
		 
	      <div><a href="stud/stud_addorg.php" target="main">项目管理</a></div>    
	      <div><a href="stud/stud_job_add.php" target="main">添加学生任职</a></div>
	      <div><a href='stud/stud_dangjout.php' target="main">学生党建数据导出</a></div>
	      <div><a href='stud/stud_export.php' target="main">学生奖惩信息导出</a></div>
	  </div><br />
	<?php
	}
	for($i=1;$i<=1;$i++)
	{
		if( $modu_news == "0" )break;
	?>  
	  <div class="hand" onclick="hide('hideMenuFunc1')">新闻管理</div>
	  <div id="hideMenuFunc1">
	      <div><a href="deptgl.php" target="main">部门管理</a> | <a href="deptadd.php" target="main">添加部门</a></div>
		  </div><br />
	<?php
	}
	for($i=1;$i<=1;$i++)
	{
		if( $modu_syst == "0" )break;
	?> 
	  <div class="hand" onclick="hide('hideMenuFunc0')">系统管理</div>
	  <div id="hideMenuFunc0">
	      <div><a href="opergl.php" target="main">管理员权限</a> | <a href="operadd.php" target="main">添加管理员</a></div>
		  <div><a href="opertx.php" target="main">管理员通讯录</a></div>
		  <div><a href="opermenpwd.php" target="main">人员密码查询</a></div>
		  <div><a href="opermultiuser.php" target="main">重复帐号管理</a></div>
	  </div><br />
	<?php
	}
	?>
   </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
</div>

