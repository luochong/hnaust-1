<?php
///	[Product]
///		新课程信息管理系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		daobase.class.php
///
///	[Description]
///		Mysql数据库类
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	------------------------------------
///	       2007/07/05    1.0.0    	王志强      	最初版本

///	       2007/07/22    1.0.1    	王志强      	增加了分页处理

///        2007/07/28    1.0.2      KuangFeng     修改了分页处理，当前页面值大于总页面值时，自动跳转到最后一页

///        2007/08/05    1.0.3      KuangFeng     修改了分页函数，加入了查询字符串的处理

@session_start();
require_once("daobase.php");
require_once("tabledefine.php");

class MysqlDao_b extends DaoBase_b
{
	private $insert_id;        //[增、删、改] 操作的数据记录id
		    
	public function insert($cond)
	{
		if (strlen($this->table_name) == 0)
		{
			$error = "table name of MysqlDAO not specified yet.";
			printf("Error： %s\n", $error);			
		}

		$argv = array();
		
		$str1 = "";
		$str2 = "";
		foreach ($cond as $key => $value)
		{
			$str1 .=  "$key, ";
			$str2 .=  "?, ";
			$argv[] = $value;
		}
		$str1 = substr($str1, 0, strlen($str1) - 2);   //截去最后的  逗号和空格两个字符
		$str2 = substr($str2, 0, strlen($str2) - 2);		
		$sql = "insert into " . $this->table_name . " ($str1) values ($str2)";
		//echo $sql;
		
		$ret = $this->executeNonQuery($sql, $argv);
		
		return $ret;
	}
	
    public function delete($cond)
	{
		if (strlen($this->table_name) == 0)
		{
			$error = "table name of MysqlDAO not specified yet.";
			printf("Error： %s\n", $error);
		}		
		
		$sql = "delete from " . $this->table_name;
		
		$argv = array();
		$haswhere = false;
		foreach ($cond as $key => $value)
		{
			if ($haswhere)
			{
				$sql .= " and $key = ?";
				$argv[] = $value;
			}
			else
			{
				$sql .= " where $key = ?";
				$argv[] = $value;
				$haswhere = true;
			}
		}		
		//echo $sql;
		$ret = $this->executeNonQuery($sql, $argv);
		
		return $ret;
	}
	
    public function update($data, $cond)
	{
		if (strlen($this->table_name) == 0)
		{
			$error = "table name of DAO not specified yet.";
			printf("Error： %s\n", $error);
		}		

		$argv = array();
		
		$str1 = "";
		foreach ($data as $key => $value)
		{
			$str1 .=  "$key = ?, ";
			$argv[] = $value;
		}
		$str1 = substr($str1, 0, strlen($str1) - 2);
			
		$str2 = "";
		
		foreach ($cond as $key => $value)
		{
			$str2 .= " and $key = ?";
			$argv[] = $value;
		}
		$str2 = substr($str2, 5);
		
		$sql = "update " . $this->table_name . " set $str1 where $str2";				
		$ret = $this->executeNonQuery($sql, $argv);
		
		return $ret;
	}
	
	/// [Summary]
	///     按指定的条件检索table_name中的记录 
	/// [Parameter]
	///     $cont - 查询条件，形如array("field1" => "xxxx", "field2" => "xxxx")
	///     $pagesize - 每页记录数。为0表示不分页检索，检索出全记录。
	///     $pageno   - 查询的页序号。$pagesize为0时，忽略此参数。
	public function select($cond = NULL, $pagesize = 0, $pageno = 0, $order = NULL)
	{
		if (strlen($this->table_name) == 0)
		{
			$error = "table name of DAO not specified yet.";
			printf("Error： %s\n", $error);
		}
		
		$tabdef = $this->getTableDefine($this->table_name);     //获得数据表table_name的表结构

		$argv = array();

		$colcount = $tabdef->getColumnCount();
		$colstr  = "";
		for ($i = 0; $i < $colcount; $i++)
		{
			$coldef = $tabdef->getColumnByIndex($i);
			$colstr .= ", " . $coldef->column_name;
		}
		$sql = "select " . substr($colstr, 2);
		$sql .= " from " . $this->table_name;

		if ($cond)
		{
			$str = "";
			foreach ($cond as $key => $value)
			{
 
				if (substr($value, 0, 1) == "%" || substr($value, -1, 1) == "%")   //模糊查询
				{
					$str .= " and $key like ?";
				}
				else
				{
					$str .= " and $key = ?";
 
				}
				$argv[] = $value;
			}
			$sql .= " where " .substr($str, 5);
		}
		
		if (isset($order))
		{
			$sql .= " order by ".$order;
		}
		
		$allrows = $this->executeQuery($sql, $argv, $pagesize, $pageno);
		
		return $allrows;
	}
	
	/// [Summary]
	///     按指定的条件查询table_name中的记录条数
	public function count($cond = NULL)
	{
		if (strlen($this->table_name) == 0)
		{
			$error = "table name of MysqlDAO not specified yet.";
			printf("Error： %s\n", $error);
		}
		$tabdef = $this->getTableDefine($this->table_name);

		$argv = array();
		
		$sql = "select count(*) from " . $tabdef->getTableName();
		//echo $sql;
		if ($cond)
		{
			$str = "";
			foreach ($cond as $key => $value)
			{
				$str .= " and $key = ?";
				$argv[] = $value;
			}
			$sql .= " where " .substr($str, 5);
		}
		//echo $sql;
		$allrows = $this->executeQuery($sql, $argv);		
		
		return $allrows[0][0];
	}
	
	/// [Summary]
	///     使用指定的Sql语句进行查询，并返回查询结果
	/// [Parameter]
	///     $sql  - 查询语句，形如："select .... from ...."
	///     $argv - 查询参数，例如："select ... where f1 = ?"中问号所代表的动态参数
 
 
	///     $pagesize - 每页记录数。为0表示不分页检索，检索出全记录。
 
	///     $pageno   - 查询的页序号。$pagesize为0时，忽略此参数。
	/// [Return]
	///     查询结果二维数组。
	///	不支持select *
	public function executeQuery($sql, $argv = NULL, $pagesize = 0, $pageno = 0)
	{		
		
		if ($pagesize < 0)
		{
			$pagesize = 0;
 		}

		if ($pageno < 0)
		{
			$pageno = 0;
		}
				
		// 校验参数有效性
		$lowstr = strtolower($sql);
		if (!(strtolower(substr($lowstr, 0, 6)) === "select"))
		{
			echo "Invalid query SQL statement.";
		}
		$pos = strpos($lowstr, "from");
		if (!strpos($lowstr, "from"))
		{			
			echo "Invalid query SQL statement.";
		}
		$colstr = substr($lowstr, 6, $pos - 6);

		// 计算查询语句输出的字段个数		
		$pos = 0;
		$colcount = 0;
		while (!($pos === false))
		{
			$pos = strpos($colstr, ",", $pos + 1);
			$colcount++;
		}

		// 创建数据库连接（如果需要）
		$connected = $this->connected();
		$conn = ($connected ? $this->conn : $this->connect(FALSE));

		// 将默认字符集设置为utf8		
		mysqli_query($conn, "set names 'utf8'");
		mysqli_query($conn, "set character set 'utf8'");

		// 查询
		$allrow = array();
		
		$stmt = mysqli_prepare($conn, $sql);
		if (mysqli_errno($conn))
		{
			$errno = mysqli_errno($conn);
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_error($conn);
			echo $error;
		}
		
		// 根据参数的个数动态生成参数绑定语句
		if (isset($argv) && count($argv) > 0)
		{
			$bind_param_cmd = "mysqli_stmt_bind_param(\$stmt, ";
			$paramstr = "";
			$bindstr = "";
			$holdstr = "";
			$i = 0;
			foreach ($argv as $arg)
			{
				$paramstr .= "\$invar$i, ";
				$bindstr .= "\$invar$i = \$argv[$i]; ";
				$holdstr .= "s";
				$i++;
			}
			$bind_param_cmd = "mysqli_stmt_bind_param(\$stmt, \"$holdstr\", " . substr($paramstr, 0, strlen($paramstr) - 2) ."); ";
			$bind_param_cmd .= $bindstr;			
			eval($bind_param_cmd);
		}
		
		// 执行SQL语句			
		mysqli_stmt_execute($stmt);
		if (mysqli_stmt_errno($stmt))
		{
			$errno = mysqli_stmt_errno($stmt);
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_stmt_error($stmt);
			echo $error;
		}
		
		// 根据查询的字段数动态生成结果绑定语句
		// 语句形如：mysqli_stmt_bind_result($stmt, $ret1, $ret2, $ret3, ...);
		$bind_result_cmd = "mysqli_stmt_bind_result(\$stmt, ";
		for ($i = 0; $i < $colcount; $i++)
		{
			$bind_result_cmd .= "\$outvar$i, ";
		}
		$bind_result_cmd = substr($bind_result_cmd, 0, strlen($bind_result_cmd) - 2) .");";		
		eval($bind_result_cmd);

		// 根据查询的字段数动态生成结果读取语句
		// 语句形如：$row = array($ret1, $ret2, $ret3, ...);
		$fetch_data_cmd = "\$row = array(";
		for ($i = 0; $i < $colcount; $i++)
		{
			$fetch_data_cmd .= "\$outvar$i, ";
		}
		$fetch_data_cmd = substr($fetch_data_cmd, 0, strlen($fetch_data_cmd) - 2) .");";		
		
		mysqli_stmt_store_result($stmt);

		// 分页检索处理
		if ($pagesize > 0)
		{
			 mysqli_stmt_data_seek($stmt, $pagesize * $pageno);
 		}
		
		$cnt = 1;
		while (mysqli_stmt_fetch($stmt))
		{
			eval($fetch_data_cmd);
			$allrow[] = $row;
 
			if ($pagesize > 0)
			{
				if ((++$cnt) > $pagesize)
				{
					break;
				}
			}
		}

		mysqli_stmt_close($stmt);
		
		// 关闭数据库连接（如果需要）
		if (!($connected))
		{
			$this->disconnect($conn);
		}
		
		return $allrow;
	}

	/// [Summary]
	///     执行非查询Sql语句（增、删、改）
	/// [Parameter]
	///     $sql  - SQL语句，形如："insert into(...) values(...)"
	///     $argv - SQL语句的数，例如："insert into(...) values(?, ?, ...)"中问号所代表的动态参数
	/// [Return]
	///     增、删、改所影响到的记录数。
	public function executeNonQuery($sql, $argv = NULL)
	{
		//Logger::trace("MysqlDao.executeNonQuery executed", LOG_LEVEL_NOTICE);

		$affected = 0;
		
		// 校验参数有效性
		$lowstr = strtolower($sql);
		if (strtolower(substr($lowstr, 0, 6)) === "select")
		{
			echo ("Invalid query SQL statement.");
		}
		//echo $sql;
		// 创建数据库连接（如果需要）
		$connected = $this->connected();
		$conn = ($connected ? $this->conn : $this->connect(FALSE));

		// 将默认字符集设置为utf8		
		mysqli_query($conn, "set names 'utf8'");
		mysqli_query($conn, "set character set 'utf8'");

		// 执行SQL语句
		$stmt = mysqli_prepare($conn, $sql);
		if (mysqli_errno($conn))
		{
			$errno = mysqli_errno($conn);
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_error($conn);
			echo $error;
		}
 		
		// 根据参数的个数动态生成参数绑定语句		
		
		if (isset($argv) && count($argv) > 0)   //此函数为计算数组长度的函数
		{
			$bind_param_cmd = "mysqli_stmt_bind_param(\$stmt, ";
			$paramstr = "";
			$bindstr = "";
			$holdstr = "";
			$i = 0;
			foreach ($argv as $arg)
			{
				$paramstr .= "\$invar$i, ";
				$bindstr .= "\$invar$i = \$argv[$i]; ";
				$holdstr .= "s";
				$i++;
			}			
			$bind_param_cmd = "mysqli_stmt_bind_param(\$stmt, \"$holdstr\", " . substr($paramstr, 0, strlen($paramstr) - 2) ."); ";			
			$bind_param_cmd .= $bindstr;
			
			eval($bind_param_cmd);    //将字符串中的变量代入  
		}
		

		// 执行SQL语句		
		
		mysqli_stmt_execute($stmt);
		
		if (mysqli_stmt_errno($stmt))
		{
			$errno = mysqli_stmt_errno($stmt);
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_stmt_error($stmt);
			echo $error;
		}

		$this->insert_id = mysqli_stmt_insert_id($stmt);   //数据库操作数据id
		//echo $this->insert_id;
		
		$affected = mysqli_stmt_affected_rows($stmt);
		
		mysqli_stmt_close($stmt);
		
		// 关闭数据库连接（如果需要）
		if (!($connected))
		{
			$this->disconnect($conn);
		}
		
		return $affected;   		
	}
	
		public function page_list($tableName,$cond=Null)
		{
			
			$this->setTableName($tableName);			
			$page=basename($_SERVER['PHP_SELF']);
			
			$http_str = $_SERVER['QUERY_STRING'];
			
			if( is_array($cond) || !$cond )
			{
				$nums = $this->count($cond);             //记录条数						
			}
			else
			{
				$sql  = "select count(*) from $tableName where $cond";
				$row  = $this->executeQuery($sql);
				$nums = $row[0][0];
			}
            $page_nums  = ceil($nums/PageNum);        //总页数           
			      
			      //echo "page_no=".$page_no;
			
            if($page_nums == 0)$page_nums = 1;
            if($page_no == "" || $page_nums < $page_no)$page_no = 1;
			echo "共".$nums."记录&nbsp;第".$page_no."页/共".$page_nums."页&nbsp;";
			if (!isset($_GET['page_no']) && $http_str!="")
			{
			    $http_str = $http_str."&";
			    if (isset($_GET['act']))
			    {
			      	$str1=$_GET['act'];
			      	$str2 = "act=".$str1;
//			      		$http_str = 
			      	$http_str=str_replace($str2,"",$http_str);
			    }
			      	
			    $page_text = $http_str."page_no";
			}
			else if ($http_str=="")
			{
			    $page_text="page_no";
			}
			else if(isset($_GET['page_no']))
			{
			    $str = $_GET['page_no'];
			    $t_str = "&page_no=".$str;
			    $str = str_replace($t_str,"",$http_str,$count);
			    $page_text = $str."&"."page_no";
			    if ($count < 1)
			    {
			      	$str = $_GET['page_no'];
			      	$t_str = "page_no=".$str;
			      	$str = str_replace($t_str,"",$http_str);
			      	$page_text = $str."page_no";			      			
			    }
			}
			
			if ($_GET['page_no'] > $page_nums && $_GET['page_no']!=1)
            {
            	$page_no = $_GET['page_no']-1;         //第几页
            	echo "<script language='javascript'>";
            	echo "window.location.href='$page?$page_text=$page_no'";
            	echo "</script>";
            }
            else
            {
			    $page_no    = $_GET['page_no'];			 //第几页	
			    if ($page_no=="")$page_no=1;
			}
			      		
			if( $page_no != 1 )
			{
            	$page_nob = $page_no - 1;
            	echo "<a href='$page?$page_text=1'>首页</a>&nbsp;<a href='$page?$page_text=$page_nob'>上一页</a>&nbsp;";
            }
            if($page_no != $page_nums)
			{
				$page_non = $page_no + 1;
				echo "<a href='$page?$page_text=$page_non'>下一页</a>&nbsp;<a href='$page?$page_text=$page_nums'>末页</a>";
            }
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<select name='select' onchange=\"location.href='$page?$page_text='+this.options[this.selectedIndex].value\">";
			for($i=1;$i<=$page_nums;$i++)
			{
				if($i == $page_no )echo "<option value='$i' selected>$i</option>";
					else echo "<option value='$i'>$i</option>";				
			}	    	
	    	echo "</select>";
			
		}	
	
		
		
	public function getInsertId()
	{
		return $this->insert_id;
	}
	
	/// [Summary]
	///     建立数据库连接
	/// [Parameter]
	///     $mode - 连接模式。TRUE：连接保持于DAO实例中，FALSE：建立方法本地连接。
	public function connect($mode = TRUE)
	{
		$conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd, $this->dbinst);
		if (mysqli_connect_errno())
		{
			$errno = mysqli_connect_errno();
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_connect_error();
			echo $error;
		}
		
		if ($mode)
		{
			$this->conn = $conn;
		}
		
		return $conn;
	}
	
	/// [Summary]
	///     释放数据库连接
	/// [Parameter]
	///     $conn - 要释放的数据库连接。如未指定，则关闭DAO实例的数据库连接。
	public function disconnect($conn = NULL)
	{
		if (isset($conn))
		{
			mysqli_close($conn);
		}
		else
		{
			mysqli_close($this->conn);
			unset($this->conn);
		}
	}
	
	protected function connected()
	{
		return isset($this->conn);
	}

	protected function startTransaction()
	{
		mysqli_autocommit($this->conn, FALSE);
	}
	
	protected function commitTransaction()
	{
		mysqli_commit($this->conn);
		mysqli_autocommit($this->conn, TRUE);
	}

	protected function rollbackTransaction()
	{
		mysqli_rollback($this->conn);
		mysqli_autocommit($this->conn, TRUE);
	}

	/// [Summary]
	///     从系统表中读取表定义
	/// [Parameter]
	///     $table_name - 表名
	/// [Return]
	///     TableDefine - 表定义
	public function getTableDefine($table_name)
	{
		// 连接系统数据库
		$dbinst = "information_schema";
		$sysconn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd, $dbinst);
		if (mysqli_connect_errno())
		{
			$errno = mysqli_connect_errno();
			$error = "MYSQL ERROR #" . $errno . " : " . mysqli_connect_error();
			echo $error;
		}

		// 读取表定义
		$sql = "select COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH, COLUMN_KEY from COLUMNS where TABLE_SCHEMA = ? and TABLE_NAME = ? order by ORDINAL_POSITION";
		$tabledef = new TableDefine_b($table_name);
		if ($stmt = mysqli_prepare($sysconn, $sql))
		{
			mysqli_stmt_bind_param($stmt, "ss", $this->dbinst, $table_name);

			mysqli_stmt_execute($stmt);
			if (mysqli_errno($sysconn))
			{
				$errno = mysqli_errno($sysconn);
				$error = "MYSQL ERROR #" . $errno . " : " . mysqli_error($sysconn);
				echo $error;
			}
			
			mysqli_stmt_bind_result($stmt, $column_name, $column_type, $column_length, $column_key);

			mysqli_stmt_store_result($stmt);

			while (mysqli_stmt_fetch($stmt))
			{
				$tabledef->addColumn($column_name, $column_type, $column_length, $column_key);
			}

			mysqli_stmt_close($stmt);
		}
		
		// 关闭系统数据库连接
		mysqli_close($sysconn);
		
		return $tabledef;
	}
}

?>