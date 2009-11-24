<?php
require_once("../../include/session.class.php");
require_once("syst_mangerfile.class.php");
$mangerfiles= new mangerfiles();


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />

<script language="JavaScript">
function delok(){
	if(confirm('你确定要删除此项目')){
		return true;
	}
	else{
		return false;
	}
}
</script>
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
      <h3><div class="left">湖南农业大学</div>
	  	  <div class="right"><a href='body.php'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
<div id="allcontent">
      <table border="0">
	  
	  <div class="alltitle">
	        <div style="float:left; width:50px">序号</div>
		    <div style="float:left; width:300px">文件名称</div>
		    <div style="float:left; width:200px">上传时间</div>
			<div style="float:left; width:100px">删除</div>
	  </div>
		  
	  
	    <?php			
		$file_list = $mangerfiles->file_list();
		for($i=0;$i<count($file_list);$i++)
		{	
			echo "
			<tr>
	        <td width='60px'>{$file_list[$i]['file_id']}</td>
		    <td width='320px'>{$file_list[$i]['file_name']}</td>
		    <td width='220px'>{$file_list[$i]['file_time']}</td>
			<td width='100px'><a class='del' href='syst_delfile.php?id={$file_list[0]['file_id']}' onClick='return delok();'>删除</a></td>
			</tr>
			";
		}
	?>
     </table>


	</div><br />
     </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>

  
<div class="clear"></div>
 
<div class="main_align">
&copy;2007&nbsp;<a href="#"></a>&nbsp; 版权所有</div>
<div class="clear"></div>
</body>
</html>
