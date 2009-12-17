<?php 
ob_start();
include_once ("../../include/session.class.php");
include_once("../../include/mysqldao.class.php");
require_once("../../control/tongji.include.php");
require_once("../../include/function.include.php");
$tongji = new Tongji();
$org_data =$tongji->getDFXID();
if(isset($_GET['i_time'])){
		$next = intval($_GET['i_time'])+1;
		$time[0] = strtotime($_GET['i_time'].'-09-01 00:00:00');
		$time[1] = strtotime($next.'-09-01 00:00:00');
	}else{
		
		$time[0] = strtotime(getYear().'-09-01 00:00:00');
		$time[1] = strtotime((getYear()+1).'-09-01 00:00:00');
}
if(isset($_GET['i_time_year'])){
	$year = intval($_GET['i_time_year']);
	$time[0] = strtotime($year.'-01-31 00:00:00');
	$time[1] = strtotime(($year+1).'-01-31 00:00:00');
}
ob_clean();
if($_POST["submit"] == "导出Excel"){
		$file_name = iconv("UTF-8","GB2312",'东方院各系素拓申报统计表');
		Header("Content-type:charset=utf-8");        
		Header("Content-type:application/octet-stream");   
		Header("Accept-Ranges:bytes");     
		Header("Content-type:application/vnd.ms-excel");	
		Header("Content-Disposition:filename=$file_name.xls");
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
      <td colspan=6 align="center"> 
	      <?php if(isset($_GET['i_time'])){echo date('Y年m月',$time[0]),'到',date('Y年m月',$time[1]);}else if($_GET['i_time_year']) {echo date('Y年',$time[0]);} ?>
	     东方院各系素拓申报统计表<small>(导出时间:<?php echo getNowDate()?>)</small>
     </td>
    </tr>
    <tr align="center" color="blue" border>
     <td>系名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
   <?php
	foreach ($org_data as $v){
		$item = $tongji->countDFXItemByOrgId($v['org_no'],$time);
		$credit=$tongji->countDFXValidCreditANDLessonCreditByOrg($v['org_no'],$time)
			?>
			<tr align="center">
			<td>&nbsp;<?php echo $v['org_name']?></td>
			<td>&nbsp;<?php echo $item["stud_count"]?></td>
			<td>&nbsp;<?php echo $item["item_count"]?></td>
			<td>&nbsp;<?php echo $item['score_count']==''?'0':$item['score_count']?></td>
			<td>&nbsp;<?php echo $credit['credit']?></td>
			<td>&nbsp;<?php echo $credit['lcredit']?></td>
			</tr>
		<?php 
	}
	?>

  </table>
  </html>
<?php }?>   

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南农业大学 后台管理</title>
</head>
<script type="text/javascript" src="<?php echo APP_ROOT?>/include/jquery.js" ></script>
<script type="text/javascript">
</script>

<link href="../css/stat.css" type=text/css rel=stylesheet />
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
      <h3><div class="left">湖南农业大学 </div>
	  	  <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	

  	 <form id="form1" name="form1" method="post" action="itemdftjy.php?<?php if(isset($_GET['i_time'])) echo "i_time={$_GET['i_time']}";?><?php if(isset($_GET['i_time_year'])) echo "i_time_year={$_GET['i_time_year']}";?>">
      <div class="alltitle">东方院各系素拓申报统计</div>
		年度选择:<select name="i_time" onchange="window.location.href ='itemdftjy.php?i_time='+this.value">
                <option value="0">...</option>
	 <?php 
	 $year = getYear();
	 for ($i = 0 ;$i<4;$i++):
	 $optionyear = $year-$i;
	 	if($_GET['i_time'] ==$optionyear){
	 ?>
	 	<option selected value="<?php echo $optionyear?>"><?php echo $optionyear ?>年9月-<?php echo $optionyear+1?>年9月</option>
	<?php 
	 	}else{
	 ?>
	 	<option value="<?php echo $optionyear?>"><?php echo $optionyear ?>年9月-<?php echo $optionyear+1?>年9月</option>
	<?php
	 	}
	 	 endfor;?>
	 </select>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 年份选择：<select name="i_time" onchange="window.location.href ='itemdftjy.php?i_time_year='+this.value">
	 <option value="0">...</option>
	 <?php 
	 $year = getYear();

	 for($i = 0 ;$i<4;$i++){
	 $optionyear = $year-$i;
	 if($_GET['i_time_year'] ==$optionyear){
	 ?>
	 	<option selected value="<?php echo $optionyear;?>"><?php echo $optionyear;?></option>
	 
	 <?php }else {?>
	 	<option value="<?php echo $optionyear;?>"><?php echo $optionyear;?></option>
	 <?php }}?>
	 
	 </select>  
	  <div id="allcontent">
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
	  	  <?php if(isset($_GET['i_time'])||isset($_GET['i_time_year'])): ?>
			  	   <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <td colspan=6 align="center">
      <?php if(isset($_GET['i_time'])){echo date('Y年m月',$time[0]),'到',date('Y年m月',$time[1]);}else if($_GET['i_time_year']) {echo date('Y年',$time[0]);} ?>
     东方院各系素拓申报统计表<small>(导出时间:<?php echo getNowDate()?>)</small></td>
    </tr>
    <tr align="center" color="blue" border>
     <td>系名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
   <?php
	foreach ($org_data as $v){
		$item = $tongji->countDFXItemByOrgId($v['org_no'],$time);
		$credit=$tongji->countDFXValidCreditANDLessonCreditByOrg($v['org_no'],$time)
			?>
			<tr align="center">
			<td>&nbsp;<?php echo $v['org_name']?></td>
			<td>&nbsp;<?php echo $item["stud_count"]?></td>
			<td>&nbsp;<?php echo $item["item_count"]?></td>
			<td>&nbsp;<?php echo $item['score_count']==''?'0':$item['score_count']?></td>
			<td>&nbsp;<?php echo $credit['credit']?></td>
			<td>&nbsp;<?php echo $credit['lcredit']?></td>
			</tr>
		<?php 
	}
	?>

  </table>
		  
		  <div> 
            <input type="submit" name="submit" value="导出Excel" />
		  </div>
	  </div><br />
	  </form>
	  <?php endif;?>
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
