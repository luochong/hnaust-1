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

class deleteuser extends MysqlDao 
{
	public function deleteAccount($id)
	{
		$this->setTableName("user_admin");
		$cond = array("user_id" => $id);
		$resu = $this->delete($cond);
		return $resu;
	}
}
?>