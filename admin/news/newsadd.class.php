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
		$this->setTableName('news');
		if($_SESSION['admin_super'] == 1){
			$data = $this->select(array('news_id'=>$id));
		}else{
			$data = $this->select(array('news_id'=>$id,'news_user'=>$_SESSION['admin_id']));
		}
		return $data[0];
	}
	public function add(){
		$this->setTableName('news');
		$data['news_title'] = $_POST['n_title'];
		$data['news_state'] = 0;
		$data['news_user']  = $_SESSION['admin_id'];
		$data['news_time']  = getNowDate(); 
		$data['news_body']  = $_POST['news_content'];
		$data['news_author'] = $_POST['n_autor'];
		$this->insert($data);
		$id = $this->getInsertId();
		header('Location: newsadd.php?id='.$id);
	}
	
}
	
	