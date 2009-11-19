<?php
/*require_once("include/session.php");
require_once("include/config.php");
require_once("include/function.php");*/
/*$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
mysql_select_db("$dbname");
mysql_query("SET NAMES 'utf8'",$hwnd);
$deptname=deptname($hwnd,$admin_dept_id,$admin_user);*/

require_once("syst_mangeruser.class.php");

$mangeruser = new mangeruser();
$row = $mangeruser->showUserList();
print_r($row);
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
		    <li style="float:left; width:80px">真实姓名</li>
		    <li style="float:left; width:155px">管理部门</li>
			<li style="float:left; width:240px">部门亲缘关系</li>
			<li style="float:left; width:40px">删除</li>
	     </ul>
	  </div>
		  
	  <div id="allcontent">
	  <table border="0">
			<tr>
	        <td width='160px'><?php echo $row[0]["user_name"]?></td>  <!--账号-->
		    <td width='80px'><a href='operedit.php?aid=$array[id]'><?php echo $row[0]["user_password"]?></a></td>  <!--密码-->
		    <td width='155px'><?php echo $row[0]["user_name"]?></td>
			<td width='240px'>$depttree</td>
			<td width='40px'><a class='del' href='delete.php?id=$array[id]&tba=1' onClick='return delok();'>删除</a></td>
			</tr>
	 </table>
		  
	 <div id="page">
	     	<?php //page($hwnd,$sql_1,$page,$pagenum,$cs); ?>
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
