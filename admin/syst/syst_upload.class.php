<?php 
///	[Product]
///		
///
///	[Copyright]
///		Copyright 2009 prolove. All rights reserved.
///
///	[Filename]
///		syst_adduser.class.php
///
///	[Description]
///		
///
///	[History]
///		Date         Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/18    1.0.0    	 DengZhuo	

require_once("../../include/mysqldao.class.php");	
error_reporting(E_ALL ^ E_NOTICE);

class uploadfiles extends MysqlDao 
{
	public function file_upload($name)
	{
		$this->setTableName("upload_file");
		$url = "admin/syst/uploads/".$name;
		$cond = array("file_name" => $name,
						"file_url" => $url);
		$resu = $this->insert($cond);
		if($resu)
		{
			echo "<script language=javascript>\n";	
			echo "alert('上传成功')\n";
			echo "window.location.href='syst_upload.php'";		
			echo "</script>\n";
		}else{
			return 'fail';
		}
	}
}
?> 