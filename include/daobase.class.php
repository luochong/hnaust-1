<?php
///	[Product]
///		 湖南农业大学宿舍管理系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		daobase.class.php
///
///	[Description]
///		数据库基类
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	------------------------------------
///        2007/08/024    1.0.0    	王志强      	最初版本
///	       2009/07/10     1.0.1   	龙首成      	学生管理   修改数据库密码


abstract class DaoBase
{
	static protected $dbhost;   //主机名
	static protected $dbuser;   //数据库用户名
	static protected $dbpwd;	//数据库密码
	static protected $dbinst;	//数据库实例（数据库名） 

    protected $conn;			// 数据库连接句柄
    protected $table_name;		//数据表名
    
    function DaoBase($conn = NULL)  
    {					
			$this->dbhost = "localhost";
			$this->dbuser = "root";
			$this->dbpwd  = ""; //sns20070804
			$this->dbinst = "sns_grouphunaun";
				
		$this->table_name = "";		
		
		if (isset($conn))
		{
			$this->conn = $conn;			
		}
		else
		{
		
		}
    }

    public function getTableName()
    {
        return $this->table_name;
    }

    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

	abstract public function insert($cond);
	
	abstract public function delete($cond);
	
	abstract public function update($data, $cond);
	
	abstract public function select($cond = NULL);
	
	abstract public function count($cond = NULL);
	
	abstract protected function getTableDefine($table_name);
	
	abstract protected function connect($mode = TRUE);
	
	abstract protected function disconnect($conn = NULL);
	
}
?>
