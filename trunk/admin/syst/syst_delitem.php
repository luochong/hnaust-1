<?php 
require_once("../../include/session.class.php");
require_once("syst_delitem.class.php");

		$item_id = $_GET['id'];
		$delitem = new delitem();
		$resu = $delitem->item_del($item_id);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php 
		if($resu==0){  
			echo "<script language=javascript>\n";	
			echo "alert('成功添加项目')\n";
			echo "window.location.href='syst_additem.php'";		
			echo "</script>\n";
		}else{
			echo "<script language=javascript>\n";	
			echo "alert('添加项目失败')\n";
			echo "window.location.href='syst_additem.php'";		
			echo "</script>\n";
		}
?>