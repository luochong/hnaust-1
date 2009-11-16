<?php 		
		@session_start();
		@include_once ("config.php");	
		error_reporting(E_ALL^E_NOTICE);						
		$admin_user = $_SESSION['stud_no'] ;  
		$admin_pwd = $_SESSION['stud_password']; 
	
		
?>