<?php 
ob_start();
include_once("../../include/mysqldao.class.php");
require_once("../../control/tongji.include.php");
require_once("../../include/function.include.php");
$tongji = new Tongji();
$name = $tongji->executeQueryA('select dept_name from group_dept where id = ?',array($_SESSION['admin_org_code']));
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
?>
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
  	 <form id="form1" name="form1" method="post" action="itemptongji.php">
      <div class="alltitle"><?php echo $name[0]['dept_name']?>素拓项目统计</div>
		  
	  <div id="allcontent">
	 年度选择:<select name="i_time" onchange="window.location.href ='itemtj.php?i_time='+this.value">
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
	 年份选择：<select name="i_time" onchange="window.location.href ='itemtj.php?i_time_year='+this.value">
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
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
   
	<?php if (isset($_GET['i_time'])||isset($_GET['i_time_year'])): ?>	
	  	
   <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <th colspan=6 align="center"><?php if(isset($_GET['i_time'])){echo date('Y年m月',$time[0]),'到',date('Y年m月',$time[1]);}else if($_GET['i_time_year']) {echo date('Y年',$time[0]);} ?><?php echo $name[0]['dept_name']?>素拓项目统计表<small>(导出时间:<?php echo getNowDate()?>)</small></th>
    </tr>
    <tr align="center" color="blue" border>
     <td>机构名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
   <?php
		
   		$item = $tongji->countDFXItemByOrgId($_SESSION['admin_org_code'],$time);
		$credit=$tongji->countDFXValidCreditANDLessonCreditByOrg($_SESSION['admin_org_code'],$time);
		
	?>
			<tr>
			<td>&nbsp;<?php echo $name[0]['dept_name']?></td>
			<td>&nbsp;<?php echo $item["stud_count"]?></td>
			<td>&nbsp;<?php echo $item["item_count"]?></td>
			<td>&nbsp;<?php echo $item['score_count']?></td>
			<td>&nbsp;<?php echo $credit['credit']?></td>
			<td>&nbsp;<?php echo $credit['lcredit']?></td>
			</tr>
  </table>
  <?php endif; ?>	
  <br />
  <br />
  <hr />
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <th colspan=6 align="center"><?php echo $tongji->getYear()?>年<?php echo $name[0]['dept_name']?>毕业生素拓项目统计表<small>(导出时间:<?php echo getNowDate()?>)</small></th>
    </tr>
    <tr align="center" color="blue" border>
     <td>机构名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
   <?php
		$item = $tongji->countBDFXItemByOrgId($_SESSION['admin_org_code']);
		$credit=$tongji->countBDFXValidCreditANDLessonCreditByOrg($_SESSION['admin_org_code']);
	?>
			<tr>
			<td>&nbsp;<?php echo $name[0]['dept_name']?></td>
			<td>&nbsp;<?php echo $item["stud_count"]?></td>
			<td>&nbsp;<?php echo $item["item_count"]?></td>
			<td>&nbsp;<?php echo $item['score_count']?></td>
			<td>&nbsp;<?php echo $credit['credit']?></td>
			<td>&nbsp;<?php echo $credit['lcredit']?></td>
			</tr>
  </table>
		  

	  </div><br />
	  </form>
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
