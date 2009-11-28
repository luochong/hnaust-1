<?php 
include_once("../include/mysqldao.class.php");
/**
 * 后台用户登录
 * luochong 2009 11
 *
 */
class LoginAction extends MysqlDao {
	
	public $error_message= '';
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
	}
	
	public function login(){
		if(empty($_POST['user_name'])||empty($_POST['user_password'])){
			$this->error_message='请填写完整！';
			return ;
		}
		if(strtolower($_POST['yzm']) != strtolower($_SESSION['yzm'])){
			$this->error_message='验证码错误！';
			return ;
		}
		$this->setTableName('user_admin');
		$rows = $this->selectA(array('user_name'=>$_POST['user_name']));
		if(count($rows)== 0||$rows[0]['user_password'] != $_POST['user_password']){
			$this->error_message ='帐号或密码错误！';
			return;
		}else{
				$_SESSION['admin_id']   = $rows[0]['user_id'];
				$_SESSION["admin_user"] = $rows[0]['user_name'];
				$_SESSION["admin_pwd"] = $rows[0]['user_password'];
				$_SESSION["admin_org_code"] = $rows[0]['user_org_code'];
				$_SESSION["admin_limt"] = $rows[0]['user_mode'];
				if($_SESSION["admin_org_code"] == SUPER_CODE)
					$_SESSION["admin_super"] = 1;//他是不是校级管理员
				else 
					$_SESSION["admin_super"] = 0;//他是不是校级管理员
				header('Location: index.php');
		}
		
	}
	public function logout(){
		$_SESSION = array();
	}
	
	public function modipwd(){
		
		if(empty($_POST['oldpwd'])||empty($_POST['newpwd'])||empty($_POST['rnewpwd'])){
			$this->error_message='请填写完整！';
			return ;
		}
		if($_POST['newpwd'] != $_POST['rnewpwd']){
			$this->error_message='两次输入新密码不一致！';
			return ;
		}
		if($_POST['oldpwd'] == $_SESSION['admin_pwd']){
			$this->setTableName('user_admin');
			$this->update(array('user_password'=>$_POST['newpwd']),array('user_id'=>$_SESSION['admin_id']));
			$_SESSION['admin_pwd'] = $_POST['newpwd'];
			$this->error_message.="<script> \n alert('修改成功！');\n location.assign('./body.php')\n </script>";			
		}else{
			$this->error_message='旧密码不正确！';
			
		}
	
	}
	
	
}

