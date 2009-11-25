<?php
require_once("../../include/edit.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<script src="/js/base.js" type="text/javascript" language="javascript">
<script src="/js/base.js" type="text/javascript" language="javascript">
<script src="/js/base.js" type="text/javascript" language="javascript">

<link href="css/stat.css" type=text/css rel=stylesheet />
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
      <h3><div class="left"><?php echo $groupname." ".$deptname;?></div>
	  	  <div class="right"><?php echo "<a href='body.php'>返 回</a>";?></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 <form id="form1" name="form1" method="post" action="" onSubmit="return checkdata();">
      <div class="alltitle">发布公告</div>
		  
	  <div id="allcontent">
	      <div>
		  <label>系统公告标题</label> <small>*必须</small> (不超过50个英文字符或者25个汉字)<br />
          <input name="title" type="text" id="title" size="50" /><br />
		  <label>系统公告内容</label> <small>*必须</small><br />
		  <textarea name="content" cols="50" rows="8" id="content"></textarea><br />
		  <div class="clear">&nbsp;</div>
		  <label>公告人：</label><?php echo $admin_name;?><br />
		  <label>发布公告部门：</label><?php echo $array_dept[dept_name];?><br />		  
		  <label>公告时间：</label><?php echo date("Y-m-d");?><br />
		  </div>
		  <div class="clear">&nbsp;</div>	  
		  <div> 
              <input type="submit" name="submit" value="  发布公告 " />   
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
