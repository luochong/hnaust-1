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

class edititem extends MysqlDao 
{
	public function item_edit()
	{
		print_r($_POST);
		$array['item_id']    =  $_GET['id'];
		$array['item_type']  =  $_POST['type'];
		$array['item_code']  =  $_POST['itemcode'];
		$array['item_rank']  =  $_POST['rank'];
		$array['item_score'] =  $_POST['itemscore'];
		$array['item_name']  =  $_POST['itemname'];
		echo $array['item_id'];
		$cond = array("item_id" => $array['item_id']);
		$this->setTableName("item_set");
		$resu = $this->update($array,$cond);
		if($resu){  
			echo "<script language=javascript>\n";	
			echo "alert('修改项目成功！')\n";
			echo "window.location.href='grouAdd02.php'";		
			echo "</script>\n";
		}else{
			echo "<script language=javascript>\n";	
			echo "alert('修改项目失败！')\n";
			echo "window.location.href='grouAdd02.php'";		
			echo "</script>\n";
		}
	}
}

?>