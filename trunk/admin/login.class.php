<?php include_once("../include/mysqldao.class.php");




class Login extends MysqlDao {
	
	public $error_message= '';
	
	
	public function login2(){
		if(empty($_POST['user_name'])||empty($_POST['user_password'])){
			$this->error_message='请填写完整！';
			return ;
		}
		$user_name = 'lc';
		$this->setTableName('user_admin');
		$rows = $this->selectA(array('user_name'=>$user_name));
		if(count($rows)== 0||$rows[0]['user_password'] == $_POST['user_password']){
			$this->error_message ='帐号或密码错误！';
			return;
		}else{
				 $_SESSION["admin_user"] = $rows[0]['user_name'];
				$_SESSION["admin_pwd"] = $rows[0]
			
			
		}
		
	}
	public function logout(){
		
		
	}
	
	
}

$a = new Login();
$a->login2();

