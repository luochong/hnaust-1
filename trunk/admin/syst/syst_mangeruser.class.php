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
define("PageNum",10);
class mangeruser extends MysqlDao 
{
	public function showUserList()
	{
		$page_no = $_GET['page_no'];
		$sql = "select user_name,user_password,user_org_code,dept_tree_name,dept_name,user_id from user_admin,group_dept
				where group_dept.id = user_admin.user_org_code";
		$row1 = $this->executeQuery($sql);
		$row = $this->executeQuery($sql,NULL,PageNum,$page_no-1);
		$row[0][count] = count($row1);
		return $row;
	}
}

?>