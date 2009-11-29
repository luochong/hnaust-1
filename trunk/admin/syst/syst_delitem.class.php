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

class delitem extends MysqlDao 
{
	public function item_del($item_id)
	{
		$this->setTableName("item_set");
		$date = array("item_status" => '0');
		$cond = array("item_id" => $item_id);
		
		print_r($date);
		$resu = $this->update($date,$cond);
		print_r($cond);echo "resu=".$resu;
	//	return $resu;
		
	}
}
?>