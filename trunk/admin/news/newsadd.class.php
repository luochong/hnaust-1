<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台新闻添加
 * luochong 2009 11
 *
 */
class NewsAddAction extends MysqlDao {
	
	public $error_message= '';
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
	}
	public function getData(){
		
		$id = intval($_GET['id']);
		if($id) {
			$this->setTableName('news');
			if($_SESSION['admin_super'] == 1){
				$data = $this->selectA(array('news_id'=>$id));
			}else{
				$data = $this->selectA(array('news_id'=>$id,'news_user'=>$_SESSION['admin_id']));
			}
			return $data[0];
		}else 
			return array();
	}
	public function add(){
		$id = intval($_GET['id']);
		$data['news_title'] = $_POST['n_title'];
		$data['news_state'] = 0;
		$data['news_user']  = $_SESSION['admin_id'];
		$data['news_time']  = getNowDate(); 
		$data['news_body']  = $_POST['news_content'];
		$data['news_author'] = $_POST['n_autor'];
		if($id){
			$this->setTableName('news');
			$this->update($data,array('news_id'=>$id));
		}else {
			$this->setTableName('news');
			$this->insert($data);
			$id = $this->getInsertId();
		}
		header('Location: newslist.php');
	}
	

}
	
	