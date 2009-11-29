<?php
require_once("../../include/session.class.php");
require_once("syst_mangeruser.class.php");
require_once("syst_mangeritem.class.php");
$mangeritem= new mangeritem();
$mangeruser = new mangeruser();
$row = $mangeruser->showUserList();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
</head>
<script language="JavaScript">
function delok(){
	if(confirm('你确定要删除部门操作员吗？')){
		return true;
	}
	else{
		return false;
	}
}
</script>
<link href="../css/stat.css" type=text/css rel=stylesheet />
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
	  	  <div class="right"><a href='#'>返 回<暂无链接></a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>

	  <div class="alltitle">
	  	 <ul>
	        <li style="float:left; width:160px">用户名</li>
		    <li style="float:left; width:80px">密码</li>
			<li style="float:left; width:240px">管理部门</li>
			<li style="float:left; width:150px">修改</li>
			<li style="float:left; width:40px">删除</li>
	     </ul>
	  </div>
		  
	  <div id="allcontent">
	  <table border="0">
	  <?php for($i=0;$i<count($row);$i++){?>
			<tr>
	        <td width='160px'><?php echo $row[$i][0]?></td>  <!--账号-->
		    <td width='80px'><a href='syst_edituser.php?id=<?php echo $row[$i][5]; ?>&username=<?php echo $row[$i][0]?>&psw=<?php echo $row[$i][1]?>&dept=<?php echo $row[$i][3]?>'><?php echo $row[$i][1]?></a></td>  <!--密码-->
			<td width='240px'><?php echo $row[$i][3]?></td>
			<td width='155px'><a class='edit' href='syst_edituser.php?id=<?php echo $row[$i][5]; ?>&username=<?php echo $row[$i][0]?>&psw=<?php echo $row[$i][1]?>&dept=<?php echo $row[$i][3]?>'>修改</a></td>
			<td width='40px'><a class='del' href='syst_deleteuser.php?id=<?php echo $row[$i][5]; ?>' onClick='return delok();'>删除</a></td>
			</tr>
	 <?php }?>
	 </table>
		  
	 <div id="page">
	     	<?php 
	     	$nums = $row[0][count];
	     	$mangeritem->page($nums);?>
	 </div>
	</div><br />
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
