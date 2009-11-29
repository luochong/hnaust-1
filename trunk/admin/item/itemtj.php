<?php 
ob_start();
include_once("../../include/mysqldao.class.php");
require_once("../../control/tongji.include.php");
require_once("../../include/function.include.php");
$tongji = new Tongji();
$name = $tongji->executeQueryA('select dept_name from group_dept where id = ?',array($_SESSION['admin_org_code']));
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
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
			  	   <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <th colspan=6 align="center"><?php echo $tongji->getYear()?>年<?php echo $name[0]['dept_name']?>素拓项目统计表<small>(导出时间:<?php echo getNowDate()?>)</small></th>
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
		$item = $tongji->countDFXItemByOrgId($_SESSION['admin_org_code']);
		$credit=$tongji->countDFXValidCreditANDLessonCreditByOrg($_SESSION['admin_org_code']);
		
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
  <br />
  <br />
  <br />
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
