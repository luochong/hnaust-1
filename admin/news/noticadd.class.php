<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台新闻添加
 * luochong 2009 11
 *
 */
class NoticAddAction extends MysqlDao {
	
	public $error_message= '';
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
	}
	public function getData(){
		
		$id = intval($_GET['id']);
		if($id) {
			$this->setTableName('notic');
			if($_SESSION['admin_super'] == 1){
				$data = $this->selectA(array('notic_id'=>$id));
			}else{
				$data = $this->selectA(array('notic_id'=>$id,'notic_user'=>$_SESSION['admin_id']));
			}
			return $data[0];
		}else 
			return array();
	}
	public function add(){
		$id = intval($_GET['id']);
		$data['notic_title'] = $_POST['n_title'];
		$data['notic_user']  = $_SESSION['admin_id'];
		$data['notic_time']  = getNowDate(); 
		$data['notic_body']  = $_POST['notic_content'];
		if($id){
			$this->setTableName('notic');
			$this->update($data,array('notic_id'=>$id));
		}else {
			$this->setTableName('notic');
			$this->insert($data);
			$id = $this->getInsertId();
		}
		header('Location: noticlist.php');
	}
	

}
	
	