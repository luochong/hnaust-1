<?php
///	[Product]
///		宿舍管理系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		session.class.php
///
///	[Description]
///		处理后台session
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2007/08/25      1.0.0    	王志强      	最初版本

/// [Summary]
///检查用户是否登录
	require_once ("mysqldao.php");	
	
	class session extends MysqlDao_b
	{
		
		public function session_check()
		{
			session_start();
			
			if ( !isset($_SESSION["admin_user"]) or $_SESSION["admin_pwd"] == "" )
			{
				echo "<script language=javascript>\n";
				echo "location.assign('../login.php')\n";
				echo "</script>\n";
				exit;	
			}
			else
			{
				$user_name = $_SESSION["admin_user"];
				$user_pwd  = $_SESSION["admin_pwd"];
				
				$sql .= "select count(*) from sns_group_admin where admin_user='$user_name' and admin_pwd='$user_pwd' ";				
			
				$rows = $this->executeQuery($sql);
				$nums = $rows[0][0];
				
				if( !$nums )
				{
					echo "<script language=javascript>\n";
					echo "location.assign('../login.php')\n";
					echo "</script>\n";
					exit;
				}
			}
			
		}	
		
		public function user_modu_limit()
		{
			$page = basename($_SERVER['PHP_SELF']);
			$page = substr($page,0,4);
			
			$user_name = $_SESSION["admin_user"];
			$user_pwd  = $_SESSION["admin_pwd"];
			$sql  = "select admin_modu_limit from sns_group_admin where admin_user='$user_name' and admin_pwd='$user_pwd' ";				
			$rows = $this->executeQuery($sql);
			$user_modu_data = $rows[0][0];
			//echo $user_modu_data;
			$modu_stat = substr($user_modu_data,0,1);
			$modu_dept = substr($user_modu_data,1,1);
			$modu_oper = substr($user_modu_data,2,1);
			$modu_memb = substr($user_modu_data,3,1);
			$modu_ment = substr($user_modu_data,4,1);
			$modu_docu = substr($user_modu_data,5,1);
			$modu_call = substr($user_modu_data,6,1);
			$modu_cour = substr($user_modu_data,7,1);
			$modu_dorm = substr($user_modu_data,8,1);
			$modu_inst = substr($user_modu_data,9,1);
			
			//echo "dsfsdfsddf".$modu_inst;
			switch( $page )
			{
				case "stat":  //数据统计模块
					if( $modu_stat == "0" )header("location:body.php");break;
				case "dept":  //部门管理模块
					if( $modu_dept == "0" )header("location:body.php");break;
				case "oper":  //操作员管理
					if( $modu_oper == "0" )header("location:body.php");break;
				case "memb":  //人员管理
					if( $modu_memb == "0" )header("location:body.php");break;
				case "ment":  //硕博导师
					if( $modu_ment == "0" )header("location:body.php");break;
				case "docu":  //文档管理
					if( $modu_docu == "0" )header("location:body.php");break;
				case "call":  //公告与留言
					if( $modu_call == "0" )header("location:body.php");break;
				case "cour":  //课程管理
					if( $modu_cour == "0" )header("location:body.php");break;
				case "dorm":  //宿舍管理[ 数据字典 ]
					if( $modu_dorm == "0" )header("location:../body.php");break;
				case "inst":  //宿舍管理 [  各级学院 ]
					if( $modu_inst == "0" )header("location:../body.php");break;
			}									
		}
		
	}
	
	$p_session = new session();
	
	$p_session->session_check();		
	$p_session->user_modu_limit();
	
?>