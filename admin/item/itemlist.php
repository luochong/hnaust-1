<?php 
require_once('../../include/function.include.php');
require_once('itemlist.class.php');
$itemlist = new ItemListAction();
$itemlist->run();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />
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
      <h3><div class="left">申报项目列表</div>
	  	  <div class="right"><a href='dorm_area01.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 
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
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php   
    
$data = $itemlist->getItemData();
foreach ($data as $t){
?>
        	  <tr>
            <td width='10px'><input type="checkbox" /></td>
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
		<div>
		共36记录&nbsp;第1页/共4页&nbsp;<a href='dorm_dorm01.php?page_no=2&area_id='>下一页</a>&nbsp;<a href='dorm_dorm01.php?page_no=4&area_id='>末页</a>&nbsp;&nbsp;&nbsp;&nbsp;<select name='select' onchange="location.href='dorm_dorm01.php?page_no='+this.options[this.selectedIndex].value+'&area_id='"><option value='1' selected>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select>		
		<input type="button" value="审核通过" />  <input type='button' value="审核不通过" /> <input type='button' value="删除" />
		
		
		
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




