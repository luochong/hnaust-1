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
	       <div><a href="item/itemlist.php" target="main">项目列表[审核]</a></div>
	  	  <div><a href="item/itemadd.php" target="main">添加项目</a></div>
		  <div><a href="item/itemsearch.php" target="main">项目查询</a></div>
	  </div><br />
	<?php
	}
	for($i=1;$i<=1;$i++)
	{
		if( $modu_news == "0" )break;
	?>  
	  <div class="hand" onclick="hide('hideMenuFunc1')">新闻管理</div>
	  <div id="hideMenuFunc1">
	      <div><a href="news/newsadd.php" target="main">发布新闻</a> | <a href="news/newslist.php" target="main">管理</a></div>
	       <?php if($_SESSION['admin_super'] == 1) {?><div><a href="news/noticadd.php" target="main">发布通知</a> | <a href="news/noticlist.php" target="main">管理</a></div><?php }?>
		  </div><br />
	<?php
	}
	for($i=1;$i<=1;$i++)
	{
		if( $modu_syst == "0" )break;
	?> 
	  <div class="hand" onclick="hide('hideMenuFunc0')">系统管理</div>
	  <div id="hideMenuFunc0">
	      <div><a href="syst/syst_adduser.php" target="main">添加管理员</a> |&nbsp; <a href="syst/syst_mangeruser.php" target="main">管理</a></div>
		  <div><a href="syst/syst_addorg.php" target="main">添加机构</a> &nbsp; | &nbsp;<a href="syst/syst_mangerorg.php" target="main">管理</a></div>
		  <div><a href="syst/syst_additem.php" target="main">添加项目</a> &nbsp; | &nbsp;<a href="syst/syst_mangeritem.php" target="main">管理</a></div>
		  <div><a href="syst/syst_upload.php" target="main">上传文件</a> &nbsp; | &nbsp;<a href="syst/syst_mangerfile.php" target="main">管理</a> </div>
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

