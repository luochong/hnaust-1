<?php 
include_once("../../include/mysqldao.class.php");
/**
 * 后台用户登录
 * luochong 2009 11
 *
 */
class ItemListAction extends MysqlDao {
	
	public $error_message= '';
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,'login')){
			$this->$_GET['ac']();
		}
	}
	public function getItemData(){
		$sql = 'select app_id,app_stud_no,stud_name,app_item_code,app_time,app_state,app_item_type,item_name,item_rank,item_score  ';
		$sql .='from item_apply,item_set,stud_baseinfo where stud_baseinfo.stud_no = item_apply.app_stud_no and item_apply.app_item_code = item_set.item_code ';
		$sql .='and item_apply.stud_orgcode = ? order by app_time DESC';
		return $this->executeQueryA($sql,array($_SESSION['admin_org_code']));
	}
	
	
}

