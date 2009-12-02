<?php 
require_once "../../include/Upload.php" ; 
require_once("syst_upload.class.php");
$uploadfiles = new uploadfiles();
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />
</head>
<?php 
if(isset($_POST['submit']))
{
	$upload = new HTTP_Upload ( "cn" ); 
	$file = $upload -> getFiles ( "f" ); 
	
	if ( $file -> isValid ()) { 
		$moved = $file -> moveTo ( 'uploads/' ); 
		if (! PEAR :: isError ( $moved )) { 
			$name = $file -> getProp ( 'name' );
			$uploadfiles->file_upload($name);
		} else { 
			echo $moved -> getMessage (); 
		} 
	} elseif ( $file -> isMissing ()) { 
		echo "<script language=javascript>\n";	
		echo "alert('文件格式错误或者文件过大造成上传文件失败！')\n";
		echo "window.location.href='syst_upload.php'";		
		echo "</script>\n";
	} elseif ( $file -> isError ()) { 
		echo $file -> errorMsg (); 
	} 
	  
	
}

?>


<body >
 <div class="allRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="allbox">
      <h3><div class="left">湖南农业大学课程管理</div>
	  	  <div class="right"><a href='javascript:history.back();'>返回 </a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
  	 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return checkdata();">
      <div class="alltitle">文件上传</div>
		  
	  <div id="allcontent"><br />
	    <div class="clear">&nbsp;
	      <table width="100%" border="0" cellspacing="3" cellpadding="2">
			<tr>
				<td>请输入文件名称：</td>
	      		<td><input name="filename" type="text" size="40"></td>
			</tr>
            <tr>
              <td>请选择上传文件</td>
              <td><label><input name="f" type="file" id="userfile" size="40" /></label></td>
            </tr>
            <!--<tr>
              <td></td>
              <td><label><input name="userfile2" type="file" id="userfile" size="40" /></label></td>
            </tr>
            <tr>
              <td></td>
              <td><label><input name="userfile3" type="file" id="userfile" size="40" /></label></td>
            </tr>-->
          </table>
	    </div>
		  <div> 
            <input type="submit" name="submit" value="上传" />
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
