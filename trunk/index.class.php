<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		索引首页
///
///	[Description]
///		索引首页页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

  
?>
<?php 
include_once("include/mysqldao.class.php");
/**
 * 学生用户登录
 * luochong 2009 11
 * longshoucheng 2009 11
 *
 */
	header("Content-type: text/html; charset=utf-8");
class LoginAction extends MysqlDao {
	
	public $error_message= '';

	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,'login')){
			$this->$_GET['ac']();
		}
	}
	
	
	public function login(){
		if(empty($_POST['user_name'])||empty($_POST['user_password'])){
				echo "<script language=javascript >\n";	
			echo "alert('请填写完整')\n";
			echo "window.location.href='index.php'\n";   
			echo "</script>\n";
			return ;
		}
		$this->setTableName('stud_baseinfo');
		$rows = $this->selectA(array('stud_no'=>$_POST['user_name']));
		
		if(count($rows)== 0||$rows[0]['stud_password'] != $_POST['user_password']){
		echo "<script language=javascript >\n";	
			echo "alert('账号或密码错误')\n";
			echo "window.location.href='index.php'\n";   
			echo "</script>\n";
			return;
		}
		/*elseif(count($rows)== 0)
		{
		    $this->error_message ='还未登录！';
		}*/
		else{
				$_SESSION["studno"] = $rows[0]['stud_no'];                   //学号存入SESSION
				$_SESSION["studpwd"] = $rows[0]['stud_password'];            //密码存入SESSION
				$_SESSION["studname"] = $rows[0]['stud_name'];
				$_SESSION["studcode"] = $rows[0]['stud_orgcode'];            //组织机构存入SESSION
			
				echo "<script>document.location='stud_home.php'</script>";
			  //  header('Location: index.php');
		}
		
	}
	
	public function logout(){
		$_SESSION = array();
	}
	
}


