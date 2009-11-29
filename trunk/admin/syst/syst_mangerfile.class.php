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

class mangerfiles extends MysqlDao 
{
	public function file_list()
	{
		$this->setTableName("upload_file");
		$cond = array("file_status" => '1');
		$row = $this->selectA($cond);
		return $row;
	}
}
?>