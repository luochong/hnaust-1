<?php 
require_once("../../include/session.class.php");
require_once("syst_deleteuser.class.php");

$delete = new deleteuser();
$user_id = $_GET["id"];
$resu = $delete->deleteAccount($user_id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
		if($resu)
		{  
				echo "<script language=javascript>\n";	
				echo "alert('删除账号成功')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
		}else{
				echo "<script language=javascript>\n";	
				echo "alert('删除失败')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
		}

?>