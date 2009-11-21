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

		if($resu)
		{  
				echo "<script language=javascript>\n";	
				echo "alert('删除账号成功')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
		}else{
				echo "<script language=javascript>\n";	
				echo "alert('删除失败')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
		}
	}
}