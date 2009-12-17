<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页类
///
///	[Description]
///		学生项目申请首页类页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
include_once("include/mysqldao.class.php");	
require_once("include/function.include.php");	
define(PageNum,20);
class notic extends MysqlDao 
{
	public function getNoticList()
	{
		$sql = "select * from upload_file where file_status = '1' order by file_time DESC";
		$row = $this->executeQueryA($sql);
		return $row;
	}
}
?>