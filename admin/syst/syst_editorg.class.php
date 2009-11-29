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
		$dept_id = $_POST['id'];
		$dept_name = $_POST['dept_name1'];
		$this->setTableName("group_dept");
		$cond = array("id" => $dept_id);
		$data = array("dept_name" =>$dept_name,"dept_tree_name" =>$dept_name);
		
		$row = $this->update($data,$cond);
		$row = $this->selectA($cond);
		return $row;
	}
}




?>