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
		if(!empty($_GET['ac'])&&method_exists($this,'login')){
			$this->$_GET['ac']();
		}
	}
	
	public function login(){
		if(empty($_POST['user_name'])||empty($_POST['user_password'])){
			$this->error_message='请填写完整！';
			return ;
		}
		$this->setTableName('user_admin');
		$rows = $this->selectA(array('user_name'=>$_POST['user_name']));
		if(count($rows)== 0||$rows[0]['user_password'] != $_POST['user_password']){
			$this->error_message ='帐号或密码错误！';
			return;
		}else{
				$_SESSION["admin_user"] = $rows[0]['user_name'];
				$_SESSION["admin_pwd"] = $rows[0]['user_password'];
				$_SESSION["user_org_code"] = $rows[0]['user_org_code'];
				header('Location: index.php');
		}
		
	}
	public function logout(){
		
		
	}
	
	
}

