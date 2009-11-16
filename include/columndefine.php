<?php
///	[Product]
///		 湖南农业大学宿舍管理系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		columndefine.class.php
///
///	[Description]
///		数据表字段定义
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	------------------------------------
///	       2007/07/05    1.0.0    	王志强      	最初版本


/// [Summary]
///     数据库表字段定义
class ColumnDefine_b
{
	public $column_name;
	public $column_type;
	public $column_length;
	public $column_key;

	function __construct($name, $type, $length, $key)
	{
		$this->column_name = strtolower($name);
		$this->column_type = strtolower($type);
		$this->column_length = $length;
		$this->column_key = strtolower($key);
	}
	
	function __destruct()
	{
	}
	
	public function __toString()
	{
		return "column_name = $this->column_name, column_type = $this->column_type, column_length = $this->column_length, column_key = $this->column_key";
	}
}

?>
