<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台项目添加
 * luochong 2009 11
 *
 */
class ItemAddAction extends MysqlDao {
	
	public $error_message= '';
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
	}
	
	public function getIname(){
		header("Content-type: text/html; charset=utf-8");
		$sql ='select distinct item_name from item_set where item_type = ?';
		$data = $this->executeQueryA($sql,array($_GET['i_type']));
		echo '<option value="" >...</option>';
		foreach ($data as $v){
			echo "<option value='{$v['item_name']}'>{$v['item_name']}</option>";
		}
		exit();
	}
	public function getIrank(){
		header("Content-type: text/html; charset=utf-8");
		$sql ='select distinct item_rank from item_set where item_name = ?';
		$data = $this->executeQueryA($sql,array($_GET['i_name']));
		echo '<option value="" >...</option>';
		foreach ($data as $v){
			echo "<option value='{$v['item_rank']}'>{$v['item_rank']}</option>";
		}
		exit();
	}
	
	public function add(){
		$cond['item_name'] = $_POST['i_name'];
		$cond['item_type'] = $_POST['i_type'];
		$cond['item_rank'] = $_POST['i_rank'];
		$this->setTableName('item_set');
		$c = $this->selectA($cond);
		if(empty($c)){
			$this->error_message = '项目填写错误！';
			return ;
		}
		$cond['item_code'] = $c[0]['item_code'];
		
		$sno_array = explode("\n",$_POST['s_no']);
		foreach ($sno_array as $v){
			$cond['s_no'] = trim($v);
			if($cond['s_no'] == '')
			 			continue;
			else 
				$this->addone($cond);
			
		}
	
	}
	
	
	public function addone($cond){
		
		$this->setTableName('stud_baseinfo');
		$o = $this->selectA(array('stud_no'=>$cond['s_no']));
		if(empty($o)){
			$this->error_message .= $cond['s_no'].'学号不存在！<br />';
			return ;
		}
		$data['app_item_code'] = $cond['item_code'];
		$data['app_stud_no'] = $cond['s_no'];
		$data['app_item_type'] = $cond['item_type'];
		if($_SESSION['admin_super'] == 1){
			$data['app_state'] = 2;
			$data['app_unitime'] = getNowDate();
		}else{
			$data['app_state'] = 1;
		}
		$data['stud_orgcode'] = $o[0]['stud_orgcode'];
		$data['app_time'] = getNowDate();
		$this->setTableName('item_apply');
		if($this->count(array('app_item_code' => $data['app_item_code'],'app_stud_no'=>$data['app_stud_no']))>0){
			$this->error_message .= $cond['s_no'].'同一项目只能申报一次！<br />';
			return ;
		}
		$this->error_message .=$cond['s_no'].'添加成功！<br />';
		$this->insert($data);
	}
	
	
	
	
}