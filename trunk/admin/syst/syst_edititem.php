<?php
require_once("../../include/session.class.php");
require_once("syst_edititem.class.php");

$edititem = new edititem();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php
	if(isset($_POST['submit']))
	{
		$edititem->item_edit();
	}
	
?>

<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['itemname'].focus();
        return true;
}
 
function checkdata() {
	var f1 = document.form1;	
	if(f1.itemscore.value==""){
		alert("请填写项目学分");
  		f1.itemscore.select();  
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
      <h3><div class="left">湖南农业大学</div>
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form id="form1" name="form1" method="post" onsubmit="return checkdata();">
      <div class="alltitle">修改项目学分:</div>
		  
	  <div id="allcontent">
        <div class="left">
          <label>项目类别：</label>
          <input name="type" id="type" size="20" readonly value="<?php echo $_GET['type']?>">
          <br />
		  <label>项目名称：</label>
		  <input name="itemname" id="itemname" size="40" value="<?php echo $_GET['name']?>" readonly/><br />
		  <label>项目编号：</label>
		  <input name="itemcode" id="itemcode" size="40"  value="<?php echo $_GET['code']?>" readonly/><br />
		  <label>项目级别：</label>
		  <input name="rank" id="rank" size="20" value="<?php echo $_GET['rank']?>" readonly/><br />
		  <label>项目学分：</label>
		  <input name="itemscore" type="text" id="itemscore" size="20" value="<?php echo $_GET['score']?>" /><br />
		  <div class="block">
		</div>
	</div>
		  <div class="clear">&nbsp;</div>
		  <div> 
               <input type="submit" name="submit" value="修改项目信息" />
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
