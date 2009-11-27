<?php 
include_once("../../include/mysqldao.class.php");
/**
 * 后台用户项目查询
 * luochong 2009 11
 *
 */
class ItemsearchAction extends MysqlDao {
	
	public $error_message= '';
	public $pn;
	public $sql;
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
		$this->pn = isset($_GET['pn'])?(intval($_GET['pn'])):1;
	}
	
		
		
}

