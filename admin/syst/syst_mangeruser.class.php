<?php 
///	[Product]
///		
///
///	[Copyright]
///		Copyright 2009 prolove. All rights reserved.
///
///	[Filename]
///		syst_mangeruser.class.php
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

class mangeruser extends MysqlDao 
{
	public function showUserList()
	{
		$this->setTableName("user_admin");
		$cond = array();
		$row = $this->selectA($cond);
		$dept = $row[0]["user_org_code"];
		
		print_r($dept_list);
		
		$sql = "select dept_tree_name from group_dept where id = $dept";
		$dept_list = $this->executeQueryA($sql);
		print_r($dept_list);
		return $row;
	}
}