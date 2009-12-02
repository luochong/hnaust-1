<?php 
///	[Product]
///		
///
///	[Copyright]
///		Copyright 2009 prolove. All rights reserved.
///
///	[Filename]
///		syst_edituser.class.php
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

class deletefile extends MysqlDao 
{
	public function filedel($id)
	{
		
		$this->setTableName("upload_file");
		$cond = array("file_id" => $id);
		$data = array("file_status" => '0');
		$resu = $this->update($data,$cond);
		$filename = "uploads/".$_GET['name'];
		$result = unlink($filename);
		return $resu;
	}
	
/*	public function DeleteFile($path){
	    $dh = opendir($path);
	    while (false !== ($filename = readdir($dh))) {
	        if ($filename == '.' || $filename == '..') {
	            continue;
	        }
	        if (is_dir($path.$filename)) {
	            DeleteFile($path.$filename."\\");
	        } elseif (is_file($path.$filename)) {
	            unlink($path.$filename);
	        }
	    }
	    closedir($dh);
	    rmdir($path);
	}*/
	
	
}
?>