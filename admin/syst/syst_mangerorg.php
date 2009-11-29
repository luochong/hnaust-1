<?php
require_once("../../include/session.class.php");
require_once("syst_mangerorg.class.php");
$mangerorg = new mangerorg();


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />

<script language="JavaScript">
function delok(){
	if(confirm('你确定要删除此部门及下属的所有子部门吗？')){
		return true;
	}
	else{
		return false;
	}
}
</script>
</head>
<body>

  <div class="allRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="allbox">
      <h3><div class="left">湖南农业大学</div>
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>

	  
	  <div class="alltitle">
	        <div class="div12">序号</div>
		    <div class="div22">部门</div>
		    <div class="div22">上级部门</div>
			<div class="div42">部门亲缘关系</div>
			<div class="div12">删除</div>
	  </div>
		  
	  <div id="allcontent">
      <table border="0">
	    <?php		
	/*	$page=basename($_SERVER['PHP_SELF']);
		$pagenum=10;	*/	
		$org_list = $mangerorg->org_list();
		for($i=0;$i<count($org_list);$i++)
		{	if(empty($org_list[$i]['dept_father_name'])) $tree = "无";else $tree = $org_list[$i]['dept_father_name'];
			echo "
			<tr>
	        <td width='50px'>{$org_list[$i]['id']}</td>
		    <td width='170px'>{$org_list[$i]['dept_name']}[<a href='syst_editorg.php?deptid={$org_list[$i][id]}&deptname={$org_list[$i][dept_name]}&ye=$ye'>修改</a>]</td>
		    <td width='150px'>$tree</td>
			<td width='320'>{$org_list[$i]['dept_tree_name']}</td>
			<td width='100'><a class='del' href='syst_delorg.php?id={$org_list[$i][id]}' onClick='return delok();'>删除</a></td>
			</tr>
			";
		}
	?>
     </table>

	     <div id="page">
	     	<?php 
	     	$nums = $org_list[0]['count'];
	     	$mangerorg->page($nums); ?>
	     </div>
	</div><br />
     </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>

  
<div class="clear"></div>
 
<div class="main_align">
&copy;2007&nbsp;<a href="#"></a>&nbsp; 版权所有</div>
<div class="clear"></div>
</body>
</html>
