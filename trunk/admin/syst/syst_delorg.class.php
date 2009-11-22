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

class orgdel extends MysqlDao 
{
	public function delorg()
	{
		
	   	$field="id";
		$value=$_GET['id'];

		$this->setTableName("group_dept");
		$cond = array("id" => $value);
	 	$array = $this->selectA($cond);
	 	$subtree=$array[0][dept_sub_tree];
	 	$s=1;
 		$str="";
		$subid=explode(":", $subtree);	
			  
		$this->setTableName("group_dept");
		$cond = array("id" => $value);
		
		$resu = $this->delete($cond);
		$cond1 = array("dept_father_id" => $value);
		$resu_1=$this->delete($cond1);
			  
			  
		if($resu || $resu_1){
			echo "<script language=javascript>\n";
			echo "alert('成功删除此部门及下属的所有子部门')\n";
			echo "window.location.href='grouAdm02.php?gid=$gid&ye=$ye'";
			echo "</script>\n";
			exit;
		}	
		else {
			echo "<script language=javascript>\n";
			echo "alert('删除部门失败！！')\n";
			echo "window.location.href='grouAdm02.php?gid=$gid&ye=$ye'";
			echo "</script>\n";
			exit;	
		}
	}

}