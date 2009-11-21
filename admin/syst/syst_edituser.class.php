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

class edituser extends MysqlDao 
{
	public function editAccount()
	{
			$array['userpwd'] = $_POST['userpwd'];
			$array['username'] = $_POST['username'];
			
			if( $_POST['modu_item'] == "check")$modu_item = "1";else $modu_item = "0";
			if( $_POST['modu_news'] == "check")$modu_news = "1";else $modu_news = "0";
			if( $_POST['modu_syst'] == "check")$modu_syst = "1";else $modu_syst = "0";
			
			$array['admin_modu_limit']= $modu_item.$modu_news.$modu_syst;		
			$this->setTableName('user_admin');
			$data = array("user_password" => $array['userpwd'],
							"user_mode" => $array['admin_modu_limit']);	
			$cond = array("user_name" => $array["username"]);

			$resu = $this->update($data,$cond);
			echo $resu;
			if($resu)
			{  
				echo "<script language=javascript>\n";	
				echo "alert('成功修改账号')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
			}
			else{
				echo "<script language=javascript>\n";	
				echo "alert('未修改账号')\n";
				echo "window.location.href='syst_mangeruser.php'";		
				echo "</script>\n";
			}
	}
}