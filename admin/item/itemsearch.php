<?php 
include_once ("../../include/session.class.php");
require_once('../../include/function.include.php');
require_once('itemsearch.class.php');
$itemsearch = new ItemsearchAction();
$itemsearch->run();
$get = "s_no={$_GET['s_no']}&s_no={$_GET['s_name']}&i_code={$_GET['i_code']}&i_type={$_GET['i_type']}&i_state={$_GET['i_state']}&i_score={$_GET['i_score']}&i_org={$_GET['i_org']}&submit={$_GET['submit']}";

if(isset($_GET['dataout'])){
	 	$data = $itemsearch->getItemData();
		Header("Content-type:charset=utf-8");        
		Header("Content-type:application/octet-stream");   
		Header("Accept-Ranges:bytes");     
		Header("Content-type:application/vnd.ms-excel");	
		Header("Content-Disposition:filename=hnaustcx.xls");
	 ?>
	 <html xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:x="urn:schemas-microsoft-com:office:excel"
        xmlns="http://www.w3.org/TR/REC-html40">
	  <head>
	        <meta http-equiv=Content-Type content="text/html; charset=utf-8">    
			<!--<link type="text/css" rel="stylesheet" href="../css/table.css" media="screen" />-->
	  </head>
	  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <td colspan="11" rowspan="2"  ><h1 style="text-align:center">项目结果查询信息表</h1></td>
    </tr>
    <tr></tr>
    <tr align="center" color="blue" border>
     
      <td>项目id</td>	
      <td>学号</td>	  
	  <td>姓名</td>	  
	  <td>班级</td>
      <td>项目编码</td>
      <td>申请时间</td>
      <td>申请状态</td>
 	  <td>项目类型</td>  
	  <td>项目名称</td>
	  <td>项目类型</td>
	  <td>项目学分</td>
	</tr>
      
	<?php 
	for($i=0;$i<count($data);$i++)
	{
	?>	
     <tr>
      <td>&nbsp;<?php echo $data[$i]['app_id'];?></td>
      <td>&nbsp;<?php echo $data[$i]['app_stud_no'];?></td>
      <td>&nbsp;<?php echo $data[$i]['stud_name'];?></td>
      <td>&nbsp;<?php echo $data[$i]['stud_class'];?></td>
      <td>&nbsp;<?php echo $data[$i]['app_item_code'];?></td> 
      <td>&nbsp;<?php echo $data[$i]['app_time'];?></td>
      <td>&nbsp;<?php echo $data[$i]['app_state'];?></td>
      <td>&nbsp;<?php echo $data[$i]['app_item_type'];?></td>
      <td>&nbsp;<?php echo $data[$i]['item_name'];?></td>
      <td>&nbsp;<?php echo $data[$i]['item_rank'];?></td>
      <td>&nbsp;<?php echo $data[$i]['item_score'];?></td>
    </tr>	
	<?php
	exit();
	}
	?>
  </table>
  </html>
<?php }?>   




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
  
	  	  <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form action="itemsearch.php" name='sform' method="GET" style="margin:0;padding:0">
	 <div>
	 <table align="center">
	 <tr>
			 <td width="80px">学号：</td><td><input name="s_no" type="text" /></td>
			 <td width="80px">姓名：</td><td><input name="s_name" type="text" /></td>
			
	 </tr>
	  <tr>
			 <td width="80px">年级：</td>
			 <td>
			 <select name="s_grade">
			  <option value="" >...</option>
			 	<?php 
			 	$year = getYear();
			 	for($i=0 ;$i<5;$i++){
			 		$optionyear = $year - $i;
			 		if( $_GET['s_grade'] == $optionyear)
			 		echo "<option value=\"$optionyear\" selected >$optionyear</option>";
			 		else		
			 		echo  "<option value=\"$optionyear\" >$optionyear</option>";
			 	}?>
			 
			 
			 </select>
			 
			 </td>
			  <td width="80px">项目类别：</td>
			 <td>
			 <select name="i_type">
			 	   <option value="" >...</option>
				  <option value="求真" <?php echo $_GET['i_type']=='求真'?'selected':''?>>求真</option>
		          <option value="求善" <?php echo $_GET['i_type']=='求善'?'selected':''?>>求善</option>
		          <option value="求美" <?php echo $_GET['i_type']=="求美"?'selected':''?>>求美</option>
		          <option value="求实" <?php echo $_GET['i_type']=="求实"?'selected':''?>>求实</option>
		          <option value="求特" <?php echo $_GET['i_type']=="求特"?'selected':''?>>求特</option>
		          <option value="求强" <?php echo $_GET['i_type']=="求强"?'selected':''?>>求强</option>
			 </select>
			 
			 </td>
			
	 </tr>
	 <tr>
			 <td width="80px">项目编号：</td><td width="200px"><input name="i_code" type="text" /></td>
		 <td width="80px">项目学分：</td>
			   <?php 
			  	  $sql = 'select distinct item_score from item_set';
			  	  $score = $itemsearch->executeQuery($sql);
			  	  $sql = 'select id,dept_name from group_dept where dept_father_id = 0';
			  	  $org = $itemsearch->executeQuery($sql);
			  	?>
			 <td>
				 <select name="i_score"  >
				 	 <option value="" >...</option>
			  		<?php foreach ($score as $v):?>
			  		<option value="<?php echo $v[0]?>" <?php echo $_GET['i_score']==$v[0]?'selected':''?> ><?php echo $v[0]?></option>
			  		<?php endforeach;?>
	  	         </select>
  	 		 </td>
	 </tr>
	 <tr>
			 <td width="80px">项目状态：</td>
			 <td width="200px"> 
				 <select name="i_state"  >
				   <option value=""  >...</option>
			  	  <option value="10" <?php echo $_GET['i_state']==10?'selected':''?> >所有记录</option>
			  	  <option value="0"  <?php echo $_GET['i_state']==='0'?'selected':''?> >未审核</option>
			  	  <option value="1" <?php echo $_GET['i_state']==1?'selected':''?> >院通过</option>
			  	  <option value="2" <?php echo $_GET['i_state']==2?'selected':''?> >校通过</option>
			  	  <option value="3" <?php echo $_GET['i_state']==3?'selected':''?> >院未通过</option>
			  	  <option value="4" <?php echo $_GET['i_state']==4?'selected':''?> >校未通过</option>
	  	         </select>
  	 		</td>
		
  	 		<td> </td>
  	 		<td><input name="dataout"  type="submit" value="数据导出" style="width:100px"  /></td>
  	 		
  	 		
  	 		
  	 		
	 </tr>
	 <tr>
		<?php if($_SESSION['admin_super']==1){?>
			 <td width="80px"> 学院：</td>
			 <td width="200px">
			 <select name="i_org">
			        <option value="" >...</option>
			    <?php foreach ($org as $v):?>
			  		<option value="<?php echo $v[0]?>" <?php echo $_GET['i_org']==$v[0]?'selected':''?> ><?php echo $v[1]?></option>
			  	<?php endforeach;?>
			 </select>
			 </td>
		<?php }else{?>    
			 <td width="80px">&nbsp;</td><td width="200px">&nbsp;</td> 
		<?php }?>
			 <td width="80px"></td><td><input name="submit"  type="submit" value="查询" style="width:100px"  /> </td>
	 </tr>
	 </table>
	
	 </div>
  	 </form>
  	 <?php if(isset($_GET['submit'])){?>
  	 			
  	 <div class="alltitle">
	        <div  style="float:left; width:30px" ></div>
	        <div style="float:left; width:100px">学号</div>
		    <div style="float:left; width:50px">姓名</div>
		    <div style="float:left; width:150px">班级</div>
			<div style="float:left; width:135px">项目名称</div>
			<div style="float:left; width:40px">类型</div>
			<div style="float:left; width:40px">学分</div>
			<div style="float:left; width:80px">审核状态</div>
			<div style="float:left;">申报时间</div>
	  </div>
		  
	  <div id="allcontent">	
	  <form action='itemlist.php?ac=onclick' name='itemform' method="POST" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php   
    
$data = $itemsearch->getItemData();
foreach ($data as $t){
?>
          <tr align="center">
            <td width='25px'><input type="checkbox" name='app_id[]' value="<?php echo $t['app_id']?>" /></td>
        	<td width='90px'><?php echo $t['app_stud_no']?></td>
            <td width='60px'><?php echo $t['stud_name']?></td>
            <td width="75px"><?php echo $t['stud_class']?></td>
            <td width="215px"><?php echo $t['item_name'],$t['item_rank']?></td>
            <td width="40px"><?php echo $t['app_item_type']?></td>
			<td width="40px"><?php echo $t['item_score']?></td>
			<td width="80px"><?php echo getItemState($t['app_state'])?></td>
			<td ><?php echo date('y-m-d',strtotime($t['app_time']))?></td>
          </tr>
<?php }?>		  		
		          </table>

		    <input type="hidden" name="action" id="action" value=""   />
		<div>

		<?php $itemsearch->makepage();?>
		<?php
		if($_GET['i_state'] != ''){
		if($_GET['i_state'] == 0 || $_SESSION['admin_super'] == 1 ){?>
		<input type="button"  value="审核通过" onclick="$('action').value = 'yes'; itemform.submit();"/> 
		<?php }?>
		<?php if($_GET['i_state'] <=1 || $_SESSION['admin_super'] == 1){?>
		 <input type='button'  value="审核不通过" onclick="$('action').value = 'no'; itemform.submit();" />
		 <input type='button'  value="删除" onclick="$('action').value = 'del'; itemform.submit();"/>
			<?php }?>
		<?php if($_GET['i_state'] ==1 || $_SESSION['admin_super'] == 1 || $_GET['i_state'] == 3){?>
		 <input type='button'  value="取消审核" onclick="$('action').value = 'quxiao'; itemform.submit();" />
		<?php }
		}?>
		</div>
			
		</form>
		</div>
<?php }?>		 
		
		
		
	
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