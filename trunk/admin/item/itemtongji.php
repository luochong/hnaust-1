<?php 
ob_start();
include_once("../../include/mysqldao.class.php");
require_once("../../control/tongji.include.php");
require_once("../../include/function.include.php");
$tongji = new Tongji();
$s_no =$tongji->getBYSNO();
ob_clean();
if($_POST["submit"] == "导出Excel"){
		$file_name = iconv("UTF-8","GB2312",'毕业生素拓课程表');
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
      <th colspan=5 align="center"><?php echo $tongji->getYear()?>年毕业生素拓课程表<small>(导出时间:<?php echo getNowDate()?>)</small></th>
    </tr>
    <tr align="center" color="blue" border>
     <td>学号</td>
     <td>姓名</td>
     <td>课程号</td>
     <td>学分</td>
     <td>成绩</td>
	</tr>
   <?php
	foreach ($s_no as $v){
		$lesson = $tongji->countLessonCredit($v['sno'],true);
		
		foreach ($lesson as $l){
			?>
			<tr>
			<td>&nbsp;<?php echo $v['sno']?></td>
			<td>&nbsp;<?php echo $v['stud_name']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_no']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_score']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_mark']?></td>
			</tr>
		<?php }
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
  	 <form id="form1" name="form1" method="post" action="itemtongji.php">
      <div class="alltitle">毕业生素拓课程</div>
		  
	  <div id="allcontent">
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
	       <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="t1">
    <tr>
      <th colspan=6 align="center"><?php echo $tongji->getYear()?>年毕业生素拓课程表<small>(毕业时间:<?php echo $tongji->getYear()?>)</small></th>
    </tr>
    <tr align="center" color="blue" border>
     <td>学号</td>
     <td>姓名</td>
     <td>课程号</td>
     <td>课程名</td>
     <td>学分</td>
     <td>成绩</td>
	</tr>
   <?php
	foreach ($s_no as $v){
		$lesson = $tongji->countLessonCredit($v['sno']);
		
		foreach ($lesson as $l){
			?>
			<tr>
			<td>&nbsp;<?php echo $v['sno']?></td>
			<td>&nbsp;<?php echo $v['stud_name']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_no']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_name']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_score']?></td>
			<td>&nbsp;<?php echo $l['mark_lesson_mark']?></td>
			</tr>
		<?php }
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
