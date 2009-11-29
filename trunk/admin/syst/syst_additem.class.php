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

class additem extends MysqlDao 
{
	public function item_add()
	{
		$array['item_type'] = $_POST['type'];
		$array['item_code'] = $_POST['itemcode'];
		$array['item_name'] = $_POST['itemname'];
		$array['item_rank'] = $_POST['grade'];
		$array['item_score'] = $_POST['itemscore'];
		
		$this->setTableName("item_set");
		$resu = $row = $this->insert($array);
		
		if($resu){  
			echo "<script language=javascript>\n";	
			echo "alert('成功添加项目')\n";
			echo "window.location.href='syst_additem.php'";		
			echo "</script>\n";
		}else{
			echo "<script language=javascript>\n";	
			echo "alert('添加项目失败')\n";
			echo "window.location.href='syst_additem.php'";		
			echo "</script>\n";
		}
	}

}
?>