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
		$sql = "select user_name,user_password,user_org_code,dept_tree_name,dept_name,user_id from user_admin,group_dept
				where group_dept.id = user_admin.user_org_code";
		$row = $this->executeQuery($sql);
		return $row;
	}
}

?>