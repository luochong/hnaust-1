<?php 
include_once ("../../include/session.class.php");
require_once('itemadd.class.php');
$action = new ItemAddAction();
$action->run();

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
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 <form id="form1" name="form1" method="post" action="itemadd.php?ac=add" onsubmit="return checkdata();">
      <div class="alltitle">项目申报</div>
		  
	  <div id="allcontent">
	  	<p style="color:#FF0000"><?php echo $action->error_message?></p>
	      <div>
		  <label>学号：</label> <small>*必须</small><br />
          <input name="s_no" type="text" id="s_no" size="40" /><br />
		  <label>项目类别：</label> <small>*必须</small><br />
			 <select name="i_type" onchange="$('#i_rank').html('<option value=\'0\'>...</option>');$('#i_name').load('./itemadd.php?ac=getIname&i_type='+encodeURIComponent(this.value));">
			 	  <option value="0">...</option>
				  <option value="求真" <?php echo $_GET['i_type']=='求真'?'selected':''?>>求真</option>
		          <option value="求善" <?php echo $_GET['i_type']=='求善'?'selected':''?>>求善</option>
		          <option value="求美" <?php echo $_GET['i_type']=="求美"?'selected':''?>>求美</option>
		          <option value="求实" <?php echo $_GET['i_type']=="求实"?'selected':''?>>求实</option>
		          <option value="求特" <?php echo $_GET['i_type']=="求特"?'selected':''?>>求特</option>
		          <option value="求强" <?php echo $_GET['i_type']=="求强"?'selected':''?>>求强</option>
			 </select><br />
		  <label>项目名称：</label> <small>*必须</small><br />
		     <select name='i_name' id='i_name' onchange="$('#i_rank').load('./itemadd.php?ac=getIrank&i_name='+encodeURIComponent(this.value));">
		     	 <option value="0">...</option>
		     </select><br />
		  <label>项目级别：</label> <small>*必须</small><br />
          	 <select name="i_rank" id='i_rank'>
          	 	 <option value="0">...</option>
          	 </select><br />
			<br />
		  </div>
		  
		  <div> 
            <input type="submit" name="submit" value="  添加项目 " />
            <input name="id" type="hidden" id="id" value="49" />
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
