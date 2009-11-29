<?php 
require_once("../../include/session.class.php");
require_once("syst_delorg.class.php");

$delorg = new orgdel();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php 
$resu = $delorg->delorg();

		if($resu){
			echo "<script language=javascript>\n";
			echo "alert('成功删除此部门及下属的所有子部门')\n";
			echo "window.location.href='syst_mangerorg.php'";
			echo "</script>\n";
			exit;
		}	
		else {
			echo "<script language=javascript>\n";
			echo "alert('删除部门失败！')\n";
			echo "window.location.href='syst_mangerorg.php'";
			echo "</script>\n";
			exit;	
		}

?>