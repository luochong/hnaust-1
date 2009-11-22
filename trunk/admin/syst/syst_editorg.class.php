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
//error_reporting(E_ALL ^ E_NOTICE);

class editorg extends MysqlDao 
{
	public function orgedit()
	{
		$dept_id = $_GET['deptid'];
		$this->setTableName("group_dept");
		$cond= array("id" => $dept_id);
		$row = $this->selectA($cond);
		return $row;
	}
}




?>