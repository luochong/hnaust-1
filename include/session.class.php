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
	require_once ("mysqldao.class.php");	
	
	class session extends MysqlDao
	{
		
		public function session_check()
		{
			session_start();
			if ( !isset($_SESSION["admin_user"]) or $_SESSION["admin_pwd"] == "" )
			{
				echo "<script language=javascript>\n";
				echo "location.assign('login.php')\n";
				echo "</script>\n";
				exit;	
			}
			else
			{
				$user_name = $_SESSION["admin_user"];
				$user_pwd  = $_SESSION["admin_pwd"];
				
				$sql = "select count(*) from user_admin where user_name ='$user_name' and user_password ='$user_pwd' ";				
			
				$rows = $this->executeQuery($sql);
				$nums = $rows[0][0];
				
				if( !$nums )
				{
					echo "<script language=javascript>\n";
					echo "location.assign('login.php')\n";
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
			$sql  = "select user_mode from user_admin where user_name='$user_name' and user_password='$user_pwd' ";				
			$rows = $this->executeQuery($sql);
			$user_modu_data = $rows[0][0];
			//echo $user_modu_data;
			$modu_item = substr($user_modu_data,0,1);
			$modu_news = substr($user_modu_data,1,1);
			$modu_syst = substr($user_modu_data,2,1);
		
			
			//echo "dsfsdfsddf".$modu_inst;
			switch( $page )
			{
				case "item":  //项目模块
					if( $modu_item == "0" )header("location:body.php");break;
				case "news":  //新闻管理模块
					if( $modu_news == "0" )header("location:body.php");break;
				case "syst":  //系统管理
					if( $modu_syst == "0" )header("location:body.php");break;
			
			}									
		}
		
	}
	
	$p_session = new session();
	$p_session->session_check();		
	$p_session->user_modu_limit();
	
?>