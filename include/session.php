<?php 		
		@session_start();
		@include_once ("config.php");	
		error_reporting(E_ALL^E_NOTICE);						
		$admin_user = $_SESSION['admin_user'] ;  
		$admin_pwd = $_SESSION['admin_pwd']; 
		$admin_name= $_SESSION['admin_name'];
		$admin_dept_id = $_SESSION['admin_dept_id']; 	//为0表示系统管理员
		$admin_limit = $_SESSION['admin_limit'];
		$admin_type = $_SESSION['admin_type'];
		$admin_unit = $_SESSION['admin_unit'];
							
		$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
		mysql_select_db("$dbname");
		mysql_query("SET NAMES 'utf8'",$hwnd);
		
		$sql = "select group_name from sns_pdc_group where id='$admin_unit'";
		$query = mysql_query($sql,$hwnd);
		$array = mysql_fetch_array($query);
		$groupname = $array[0];  //集团名称
		
		$sql   = "select admin_modu_limit from sns_group_admin where admin_user='$admin_user' and admin_pwd='$admin_pwd'";
		$query = mysql_query($sql,$hwnd);
		$nums  = mysql_num_rows($query);
		$host = $_SERVER['HTTP_HOST'];
		
		if($nums==0)
		{
			//echo "fail";
			echo "<script language=javascript>\n";	
			echo "alert('你还没有登录系统，请返回登录')\n";
			echo "window.open('HTTP://{$host}/g/hunauN/login.php','_top');";   //跳出框架 重定向到登录页面
			echo "</script>\n";
			exit;
		}
		
		$page = basename($_SERVER['PHP_SELF']);   //返回路径中的文件名部分
		$page = substr($page,0,4);                //获得文件名的前四位
		$user_modu_data  = mysql_fetch_array($query);   //读出用户权限
		$modu_stat = substr($user_modu_data[0],0,1);
		$modu_dept = substr($user_modu_data[0],1,1);
		$modu_oper = substr($user_modu_data[0],2,1);
		$modu_memb = substr($user_modu_data[0],3,1);
		$modu_ment = substr($user_modu_data[0],4,1);
		$modu_docu = substr($user_modu_data[0],5,1);
		$modu_call = substr($user_modu_data[0],6,1);
		$modu_cour = substr($user_modu_data[0],7,1);
		$modu_dorm = substr($user_modu_data[0],8,1);
		$modu_inst = substr($user_modu_data[0],9,1);
		$modu_stud = substr($user_modu_data[0],10,1);
	
		switch( $page )
		{  //如果进入到没有权限的模块，则跳转到body.php
			case "stat":   //数据统计模块
				if( $modu_stat == "0" )header("location:body.php");break;
			case "dept":  //部门管理模块
				if( $modu_dept == "0" )header("location:body.php");break;
			case "oper":  //操作员管理
				if( $modu_oper == "0" )header("location:body.php");break;
			case "memb":  //人员管理
				if( $modu_memb == "0" )header("location:body.php");break;
			case "ment":  //硕博导师
				if( $modu_ment == "0" )header("location:body.php");break;
			case "douc":  //文档管理
				if( $modu_docu == "0" )header("location:body.php");break;
			case "call":  //公告与留言
				if( $modu_call == "0" )header("location:body.php");break;
			case "cour":  //课程管理
				if( $modu_cour == "0" )header("location:body.php");break;
			case "dorm":  //宿舍管理[ 数据字典 ]
					if( $modu_dorm == "0" )header("location:../body.php");break;
			case "inst":  //宿舍管理 [  各级学院 ]
					if( $modu_inst == "0" )header("location:../body.php");break;
			case "grou":  //集团管理 [  管理员 ]
					if( $admin_dept_id != "0" )header("location:../body.php");break;
		}
		
?>