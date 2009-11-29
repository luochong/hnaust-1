<?php  
require_once("syst_delfile.class.php");
$deletefile = new deletefile();

$id = $_GET['id'];
$resu = $deletefile->filedel($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
		if($resu==0)
		{  
				echo "<script language=javascript>\n";	
				echo "alert('删除文件成功')\n";
				echo "window.location.href='syst_mangerfile.php'";		
				echo "</script>\n";
		}else{
				echo "<script language=javascript>\n";	
				echo "alert('删除文件失败')\n";
				echo "window.location.href='syst_mangerfile.php'";		
				echo "</script>\n";
		}

?>