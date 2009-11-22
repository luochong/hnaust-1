<?php 
require_once('../../include/function.include.php');
require_once('itemsearch.class.php');
$itemlist = new ItemsearchAction();
$itemlist->run();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />
<script language="javascript" type="text/javascript">

function $(id){
	return document.getElementById(id);
}
</script>

</head>
<body >
 <div class="allRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="allbox">
      <h3><div class="left">项目查询</div>
	  	  <div class="right"><a href='../body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form action="itemlist.php" name='sform' method="GET" style="margin:0;padding:0">
	 <div class="alltitle">学号：<input type="text" /></div>
	  <div class="alltitle">姓名：<input type="text" /></div>
	  <div class="alltitle">项目编号：<input type="text" /></div>
	  <div class="alltitle">
  	 
  	 项目状态：
  	 <select name="s" onchange="sform.submit();" >
		  	  <option value="10" <?php echo $_GET['s']==10?'selected':''?> >所有记录</option>
		  	 <option value="0"  <?php echo $_GET['s']==0?'selected':''?> >未审核</option>
		  	 <option value="1" <?php echo $_GET['s']==1?'selected':''?> >院通过</option>
		  	 <option value="2" <?php echo $_GET['s']==2?'selected':''?> >校通过</option>
		  	  <option value="3" <?php echo $_GET['s']==3?'selected':''?> >院未通过</option>
		  	   <option value="4" <?php echo $_GET['s']==4?'selected':''?> >校未通过</option>
  	 </select></div>
  	 
  	   	 <div class="alltitle">项目类别：
  	 <select name="s" onchange="sform.submit();" >
		  	  <option value="10" <?php echo $_GET['s']==10?'selected':''?> >所有记录</option>
		  	 <option value="0"  <?php echo $_GET['s']==0?'selected':''?> >未审核</option>
		  	 <option value="1" <?php echo $_GET['s']==1?'selected':''?> >院通过</option>
		  	 <option value="2" <?php echo $_GET['s']==2?'selected':''?> >校通过</option>
		  	  <option value="3" <?php echo $_GET['s']==3?'selected':''?> >院未通过</option>
		  	   <option value="4" <?php echo $_GET['s']==4?'selected':''?> >校未通过</option>
  	 </select></div>
  	 
  	 	   	 <div class="alltitle">项目学分：
  	 <select name="s" onchange="sform.submit();" >
		  	  <option value="10" <?php echo $_GET['s']==10?'selected':''?> >所有记录</option>
		  	 <option value="0"  <?php echo $_GET['s']==0?'selected':''?> >未审核</option>
		  	 <option value="1" <?php echo $_GET['s']==1?'selected':''?> >院通过</option>
		  	 <option value="2" <?php echo $_GET['s']==2?'selected':''?> >校通过</option>
		  	  <option value="3" <?php echo $_GET['s']==3?'selected':''?> >院未通过</option>
		  	   <option value="4" <?php echo $_GET['s']==4?'selected':''?> >校未通过</option>
  	 </select></div>
  	 	   	 
  	 <div class="alltitle">学院：
  	 <select name="s" onchange="sform.submit();" >
		  	  <option value="10" <?php echo $_GET['s']==10?'selected':''?> >所有记录</option>
		  	 <option value="0"  <?php echo $_GET['s']==0?'selected':''?> >未审核</option>
		  	 <option value="1" <?php echo $_GET['s']==1?'selected':''?> >院通过</option>
		  	 <option value="2" <?php echo $_GET['s']==2?'selected':''?> >校通过</option>
		  	  <option value="3" <?php echo $_GET['s']==3?'selected':''?> >院未通过</option>
		  	   <option value="4" <?php echo $_GET['s']==4?'selected':''?> >校未通过</option>
  	 </select></div>
  	 
  	 
  	 
  	 </form>
	  
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 
  	 <div class="alltitle">
	        <div  style="float:left; width:30px" ><input type="checkbox" /></div>
	        <div style="float:left; width:100px">学号</div>
		    <div style="float:left; width:50px">姓名</div>
		    <div style="float:left; width:80px">项目编号</div>
			<div style="float:left; width:200px">项目名称</div>
			<div style="float:left; width:40px">类型</div>
			<div style="float:left; width:40px">学分</div>
			<div style="float:left; width:70px">审核状态</div>
			<div style="float:left; width:60px">申报时间</div>
	  </div>
		  
	  <div id="allcontent">	
	  <form action='itemlist.php?ac=onclick' name='itemform' method="POST" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php   
    
$data = $itemlist->getItemData();
foreach ($data as $t){
?>
        	  <tr>
            <td width='10px'><input type="checkbox" name='app_id[]' value="<?php echo $t['app_id']?>" /></td>
        	<td width='80px'><?php echo $t['app_stud_no']?></td>
            <td width='40px'><?php echo $t['stud_name']?></td>
            <td width='60px'><?php echo $t['app_item_code']?></td>
            <td width='150px'><?php echo $t['item_name'],$t['item_rank']?></td>
            <td width='40px'><?php echo $t['app_item_type']?></td>
			<td width='40px'><?php echo $t['item_score']?></td>
			<td width='40px'><?php echo getItemState($t['app_state'])?></td>
			<td width='60px'><?php echo date('y-m-d',strtotime($t['app_time']))?></td>
          </tr>
<?php }?>		  		
		          </table>
		    <input type="hidden" name="action" id="action" value=""   />
		<div>
		<?php $itemlist->makepage();?>
		<?php if($_GET['s'] ==0 || $_SESSION['admin_super'] == 1 ){?>
		<input type="button"  value="审核通过" onclick="$('action').value = 'yes'; itemform.submit();"/> 
		<?php }?>
		<?php if($_GET['s'] <=1 || $_SESSION['admin_super'] == 1){?>
		 <input type='button'  value="审核不通过" onclick="$('action').value = 'no'; itemform.submit();" />
	
		
		 <input type='button'  value="删除" onclick="$('action').value = 'del'; itemform.submit();"/>
			<?php }?>
		</form>
		
		
		</div>
     
		</div>
	 
	 </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>



</body>
</html>




