<?php 
include_once ("../../include/session.class.php");
include_once("../../include/edit.class.php");
require_once('noticadd.class.php');
if($_SESSION['admin_super'] != 1){
						echo "<script language=javascript>\n";
					echo "location.assign('".APP_ROOT."/admin/login.php')\n";
					echo "</script>\n";
					exit;
}
$noticadd = new NoticAddAction();
$noticadd->run();
$edit = new editControl();
$edit->from_name='notic_content';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南农业大学 后台管理</title>
</head>
<script type="text/javascript" src="<?php echo APP_ROOT?>/include/jquery.js" ></script>
<script type="text/javascript">
function checkdata(){
	if($('#n_title').val()==''){
		alert('标题不能为空！');
		return false;
	}
	
	if(<?php echo $edit->getContent();?>){
		return true;
	}else{
		alert('内容不能为空！');
		return false;
	}
	
	
}
</script>

<link href="../css/stat.css" type=text/css rel=stylesheet />
</head>
<body onLoad="return loadb();">
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
  	 <form id="form1" name="form1" method="post" action="noticadd.php?ac=add<?php if(isset($_GET['id'])) echo '&id=',$_GET['id'];?>" onsubmit="return checkdata();">
      <div class="alltitle">通知发布</div>
      <?php $notic = $noticadd->getData();?>
      	<p style="color:#FF0000"><?php echo $action->error_message?></p>
		<div style="margin:10px 30px">
		通知标题：<input name="n_title" id='n_title' value="<?php echo $notic['notic_title']?>" size="80" /><br />
		<br />
		
		</div>
	
		
      <div style="margin:5px 30px">
      <?php $edit->content = $notic['notic_body'] ;?>
      通知内容：
		<?php $edit->display(); ?>
	  </div><br />
	  <div style="margin:10px 30px;" align="right"><input type="submit" name="submit"  value="   提交   " /></div>
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





