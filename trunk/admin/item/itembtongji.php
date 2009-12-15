<?php 
ob_start();
include_once ("../../include/session.class.php");
include_once("../../include/mysqldao.class.php");
require_once("../../control/tongji.include.php");
require_once("../../include/function.include.php");
$tongji = new Tongji();
$org_data =$tongji->getCNO();
ob_clean();
if($_POST["submit"] == "导出Excel"){
		$file_name = iconv("UTF-8","GB2312",'各学院毕业生素拓项目统计表');
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
      <th colspan=6 align="center"><?php echo $tongji->getYear()?>年各学院毕业生素拓项目统计表<small>(导出时间:<?php echo getNowDate()?>)</small></th>
    </tr>
    <tr align="center" color="blue" border>
     <td>学院名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
	<tr>
		<td align="center">&nbsp;东方院</td>
	<?php $DFitem = $tongji->countBDFItem();
				$DFcredit = $tongji->countBDFValidCreditANDLessonCreditByOrg();
			?>
   			<td align="center">&nbsp;<?php echo $DFitem["stud_count"]?></td>
			<td align="center">&nbsp;<?php echo $DFitem["item_count"]?></td>
			<td align="center">&nbsp;<?php echo $DFitem['score_count']==''?'0':$DFitem['score_count']?></td>
			<td align="center">&nbsp;<?php echo $DFcredit['credit']?></td>
			<td align="center">&nbsp;<?php echo $DFcredit['lcredit']?></td>
		</tr>
   <?php
	foreach ($org_data as $v){
		$item = $tongji->countBItemByOrgId($v['org_no']);
		$credit=$tongji->countBValidCreditANDLessonCreditByOrg($v['org_no'])
			?>
			<tr>
			<td align="center">&nbsp;<?php echo $v['org_name']?></td>
			<td align="center">&nbsp;<?php echo $item["stud_count"]?></td>
			<td align="center">&nbsp;<?php echo $item["item_count"]?></td>
			<td align="center">&nbsp;<?php echo $item['score_count']==''?'0':$item['score_count']?></td>
			<td align="center">&nbsp;<?php echo $credit['credit']?></td>
			<td align="center">&nbsp;<?php echo $credit['lcredit']?></td>
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
  	 <form id="form1" name="form1" method="post" action="itembtongji.php">
      <div class="alltitle">各学院毕业生素拓项目统计</div>
		  
	  <div id="allcontent">
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
	   <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <td colspan=6 align="center"><?php echo $tongji->getYear()?>年各学院毕业生素拓项目统计表<small>(导出时间:<?php echo getNowDate()?>)</small></td>
    </tr>
    <tr align="center" color="blue" border>
     <td>学院名称</td>
     <td>申报总人数</td>
     <td>申报总项目数</td>
     <td>总申报学分</td>
     <td>总有效学分</td>
     <td>总课程学分</td>
	</tr>
	<tr>
		<td align="center">&nbsp;东方院</td>
	<?php $DFitem = $tongji->countBDFItem();
				$DFcredit = $tongji->countBDFValidCreditANDLessonCreditByOrg();
			?>
   			<td align="center">&nbsp;<?php echo $DFitem["stud_count"]?></td>
			<td align="center">&nbsp;<?php echo $DFitem["item_count"]?></td>
			<td align="center">&nbsp;<?php echo $DFitem['score_count']==''?'0':$DFitem['score_count']?></td>
			<td align="center">&nbsp;<?php echo $DFcredit['credit']?></td>
			<td align="center">&nbsp;<?php echo $DFcredit['lcredit']?></td>
		</tr>
   <?php
	foreach ($org_data as $v){
		$item = $tongji->countBItemByOrgId($v['org_no']);
		$credit=$tongji->countBValidCreditANDLessonCreditByOrg($v['org_no'])
			?>
			<tr>
			<td align="center">&nbsp;<?php echo $v['org_name']?></td>
			<td align="center">&nbsp;<?php echo $item["stud_count"]?></td>
			<td align="center">&nbsp;<?php echo $item["item_count"]?></td>
			<td align="center">&nbsp;<?php echo $item['score_count']==''?'0':$item['score_count']?></td>
			<td align="center">&nbsp;<?php echo $credit['credit']?></td>
			<td align="center">&nbsp;<?php echo $credit['lcredit']?></td>
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
