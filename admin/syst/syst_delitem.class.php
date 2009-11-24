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
		$resu = $this->update($date,$cond);
		
		if($resu){  
			echo "<script language=javascript>\n";	
			echo "alert('删除项目成功！')\n";
			echo "window.location.href='grouAdd02.php'";		
			echo "</script>\n";
		}else{
			echo "fail";
		}
	}
}
?>