<?php
require_once("../../include/session.class.php");
require_once("syst_additem.class.php");
$additem = new additem();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php
	if(isset($_POST['submit']))
	{
		$additem->item_add();
	}
	
?>

<script type="text/javascript">
function loadb(){	 
	    document.forms[0].elements['itemname'].focus();
        return true;
}
function checkspace(checkstr)
{
  var str = '';
  for(i = 0; i < checkstr.length; i++)
  {
    str = str + ' ';
  }
  return (str == checkstr);
} 
function checkdata() {
	var f1 = document.form1;	

	if(f1.itemname.value==""){
		alert("请填写项目名称");
  		f1.itemname.select();  
  		return false;
	}
	if(f1.itemcode.value==""){
		alert("请填写项目编号");
  		f1.itemcode.select();  
  		return false;
	}
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
	  	  <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	  <form id="form1" name="form1" method="post" onsubmit="return checkdata();">
      <div class="alltitle">添加项目:</div>
		  
	  <div id="allcontent">
	  	
		
        <div class="left">
          <label>项目类别：</label>
          <select name="type">
          <option value="求真">求真</option>
          <option value="求善">求善</option>
          <option value="求美">求美</option>
          <option value="求实">求实</option>
          <option value="求特">求特</option>
          <option value="求强">求强</option>
          </select><small>*必须</small><br />
		  <label>项目名称：</label> <small>*必须</small><br />
		  <input name="itemname" type="text" id="itemname" size="40" /><br />
		  <label>项目编号：</label> <small>*必须</small><br />
		  <input name="itemcode" type="text" id="itemname" size="40" /><br />
		  <label>项目级别：</label> <small>*必须</small><br />
		  <select name="grade">
		  <option value="国家级">国家级</option>
		  <option value="省级">省级</option>
		  <option value="市级">市级</option>
		  <option value="校级">校级</option>
		  <option value="院级">院级</option>
		  </select> <br />
		  <label>项目学分：</label> <small>*必须</small><br />
		  <input name="itemscore" type="text" id="itemscore" size="40" /><br />
		  <div class="block">
		  </div>
	</div>
		  <div class="clear">&nbsp;</div>
		  <div> 
               <input type="submit" name="submit" value="添加项目" />
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
