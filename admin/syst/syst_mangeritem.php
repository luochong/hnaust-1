<?php
require_once("../../include/session.class.php");
require_once("syst_mangeritem.class.php");
$mangeritem= new mangeritem();
$mangeritem->item_manger();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />

<script language="JavaScript">
function delok(){
	if(confirm('你确定要删除此项目')){
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
	  	  <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
<div id="allcontent">
      <table border="0">
	  
	  <div class="alltitle">
	        <div style="float:left; width:50px">序号</div>
		    <div style="float:left; width:50px">类别</div>
		    <div style="float:left; width:100px">编码</div>
		    <div style="float:left; width:250px">名称</div>
			<div style="float:left; width:80px">等级</div>
			<div style="float:left; width:50px">学分</div>
			<div style="float:left; width:50px">删除</div>
	  </div>
		  
	    <?php		
		$page=basename($_SERVER['PHP_SELF']);
		$pagenum=10;		
		$item_list = $mangeritem->item_manger();
		for($i=0;$i<count($item_list);$i++)
		{	if(empty($item_list[$i]['item_rank'])) $tree = "无";else $tree = $item_list[$i]['item_rank'];
		?>
			<tr>
	        <td width='60px'><?php echo $item_list[$i]['item_id']?></td>
		    <td width='60px'><?php echo $item_list[$i]['item_type']?></td>
		    <td width='120px'><?php echo $item_list[$i]['item_code']?></td>
		    <td width='260px'><?php echo $item_list[$i]['item_name']?></td>
		    <td width='80px'><?php echo $tree?></td>
			<td width='50px'><?php echo $item_list[$i]['item_score']?>[<a href="syst_edititem.php?id=<?php echo $item_list[$i]['item_id']?>&type=<?php echo $item_list[$i]['item_type']?>&code=<?php echo $item_list[$i]['item_code']?>&name=<?php echo $item_list[$i]['item_name']?>&score=<?php echo $item_list[$i]['item_score']?>&rank=<?php echo $tree?>">编辑</a>]</td>
			<td width='50px'><a class='del' href='syst_delitem.php?id=<?php echo $item_list[$i]['item_id']?>' onClick='return delok();'>[<span style="color:red"><b>╳</b></span>]</a></td>
			</tr>
		<?php 
		}
		?>
     </table>

	     <div id="page">
	     	<?php 
	     	$nums = $item_list[0]['count'];
	     	$mangeritem->page($nums);?>
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
</div>
<div class="clear"></div>
</body>
</html>
