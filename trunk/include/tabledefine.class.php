<?php
///	[Product]
///		 湖南农业大学宿舍管理系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		tabledefine.class.php
///
///	[Description]
///		数据库表定义
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	------------------------------------
///	       2007/08/24    1.0.0    	王志强      	最初版本


require_once("columndefine.class.php");

/// [Summary]
///     数据库表定义
class TableDefine
{
	private $table_name;
	private $column_index;
	private $column_name;
	private $column_count;

	function TableDefine($name)
	{
		$this->table_name = strtolower($name);
		$this->column_index = array();
		$this->column_name = array();
		$this->column_count = 0;
	}
		
	public function addColumn($name, $type, $length, $key)
	{
		$column = new ColumnDefine($name, $type, $length, $key);
		$this->column_index[] = $column;
		$this->column_name[$name] = $column;
		$this->column_count++;
	}
	
	public function makeAllColumnListStatement()
	{
		$str = "";
		foreach ($this->column_index as $column)
		{
			$str = "$str{$column->column_name}, ";
		}
		$str = substr($str, 0, strlen($str) - 2);
		return $str;
	}

	public function makePkColumnConditionStatement()
	{
		$str = "";
		foreach ($this->column_index as $column)
		{
			if ($column->column_key === "pri")
			{
				$str = "$str{$column->column_name} = ? and ";
			}
		}
		$str = substr($str, 0, strlen($str) - 5);
		return $str;
	}

	public function makeNonPkColumnConditionStatement()
	{
		$str = "";
		foreach ($this->column_index as $column)
		{
			if (!($column->column_key === "pri"))
			{
				$str = "$str{$column->column_name} = ? and ";
			}
		}
		$str = substr($str, 0, strlen($str) - 5);
		return $str;
	}

	public function makeColumnConditionStatement($argv)
	{
	}

	public function __toString()
	{
		$str = "table_name = $this->table_name: <br/>";
		for ($i = 0; $i < $this->column_count; $i++)
		{
			$str = $str . "{" . $this->column_index[$i] . "}<br/>";
		}
		return $str;
	}
	
	public function getTableName()
	{
		return $this->table_name;
	}
	
	public function getColumnCount()
	{
		return $this->column_count;
	}
	
	public function getColumnByIndex($idx)
	{
		if (isset($this->column_index[$idx]))
		{
			return $this->column_index[$idx];
		}
		else
		{
			return NULL;
		}
	}
	
	public function getColumnByName($name)
	{
		if (isset($this->column_name[$name]))
		{
			return $this->column_name[$name];
		}
		else
		{
			return NULL;
		}
	}
}

?>
