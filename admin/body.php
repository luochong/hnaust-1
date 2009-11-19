<?php 
include_once ("../include/session.class.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="css/scrlContainer.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/stat.css" media="screen" />

<script type="text/javascript">

function changeTab( id ) {
	var thisID = id;
	var blockID = id + "_block";
	
	document.getElementById('menu01').className = "";
	document.getElementById('menu02').className = "";
	document.getElementById('menu03').className = "";
	document.getElementById('menu04').className = "";
	document.getElementById('menu05').className = "";


	
	document.getElementById('menu01_block').style.display = "none";
	document.getElementById('menu02_block').style.display = "none";
	document.getElementById('menu03_block').style.display = "none";
	document.getElementById('menu04_block').style.display = "none";
	document.getElementById('menu05_block').style.display = "none";

	
	document.getElementById(thisID).className = "selected";
	document.getElementById(blockID).style.display = "block";
	
}


</script>
<script type="text/javascript">
function showre( id ) {

	if(document.getElementById(id).style.display=="block"){
		document.getElementById(id).style.display = "none";
	}
	else{
		document.getElementById(id).style.display = "block";
	}
}
</script>
</head>
<body>
<div class="clear"></div>

<div id="scrlContainer">系统公告：
   <div id="scrlContent">
	  <a href="#">[管理员使用手册]湖南农业大学学生素质拓展学分认证平台 <b>提供下载</b></a>
   </div>
</div>

<div id="me">
<div id="content">
     <div class="statblock">
        <div class="statbg"> 
         <h3>项目数据统计:</h3>
		
         
         
         
         
        </div>
	 </div>
			
    <div class="footer">
	  <h2>统计数据汇总时间:<?php echo date('Y-m-d') ?></h2>
   </div>

</div>

	
	
  <div class="rightRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="leftmenu">
      <h3>本学年项目审批情况汇总:</h3>
	  <div class="handtitle">审批结果</div>
	  <div id="rightcontent">
	      <div>总送审项目数：1234个</div>
		  <div>总批准项目数：1123个</div>
		  <div>送审项目总学分：2546分</div>
		  <div>送审项目总有效学分：2014分</div>
	  </div><br />
     </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>
  
 </div>

<div style="clear: both;">&nbsp;</div> 
 
<div class="main_align">
&copy;2009&nbsp;<a href="#"></a>&nbsp; 版权所有</div>
<div class="clear"></div>
</body>
</html>