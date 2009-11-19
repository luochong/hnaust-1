<?php 
require_once('../include/mysqldao.class.php');
class Tongji extends MysqlDao {
	
	public function student(){
		
		
		
	}
	
	
	
	
	
	public function countItemByStudId($id){
		$this->setTableName('item_apply');
		return $this->count(array('app_stud_no'=>$id));
	}
	
	
	
	
	






}