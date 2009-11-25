<?php 		
		@session_start();
		@include_once ("config.php");
		header('Content-Type:   text/html;   charset=utf-8');
		error_reporting(E_ALL^E_NOTICE);
		    $studno=$_SESSION['studno'];
            $studpwd=$_SESSION['studpwd'];						
		 
	    $hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
		mysql_select_db("$dbname");
		mysql_query("SET NAMES 'utf8'",$hwnd);
	    
			$sql = "select stud_password from stud_baseinfo where stud_no='$studno'";
		$query = mysql_query($sql,$hwnd);
		$array = mysql_fetch_array($query);
		$pwd = $array[0];  //密码
		
	
		$nums  = mysql_num_rows($query);
		$host = $_SERVER['HTTP_HOST'];
		sleep(1);   
		
		if($nums==0)
		{
			//echo "fail";
			echo "<script language=javascript >\n";	
			echo "alert('你还没有登录系统，请返回登录')\n";
			echo "window.open('HTTP://{$host}/index.php','_top');";   //跳出框架 重定向到登录页面
			echo "</script>\n";
			exit;
		}
		
             
	 
	     
		
		
?>