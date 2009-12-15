<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台项目列表
 * luochong 2009 11
 *
 */
class ItemListAction extends MysqlDao {
	
	public $error_message= '';
	public $pn;
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
		$this->pn = isset($_GET['pn'])?(intval($_GET['pn'])):1;
		$_GET['s'] = isset($_GET['s'])?(intval($_GET['s'])):10;
	}
	public function onclick(){
		$this->setTableName('item_apply');
		if(empty($_POST['app_id'])){return ;}
		switch ($_POST['action']){
			case 'yes':{
				if($_SESSION['admin_super'] == 1) 
				{	$state = 2;//校审核
					$time= 'app_unitime';
				}	
				else
				{	$state = 1;//院审核
					$time= 'app_coltime ';
				}
				 foreach ($_POST['app_id'] as $id){
					 	$this->update(array('app_state'=>$state,$time=>getNowDate()),array('app_id'=>$id));
					 }
				break;
			}
			case 'no':{
				if($_SESSION['admin_super'] == 1) 
				{$state = 4;//校审核
					$time= 'app_unitime';
				}	
				else
				{$state = 3;//院审核
				$time= 'app_coltime ';
				}
				 foreach ($_POST['app_id'] as $id){
					 	$this->update(array('app_state'=>$state,$time=>getNowDate()),array('app_id'=>$id));
					 }
				break;
			}
			case 'del':{
				if($_SESSION['admin_super'] == 1) 
					foreach ($_POST['app_id'] as $id){
						$this->delete(array('app_id'=>$id));
					}
				
				else
					foreach ($_POST['app_id'] as $id){
						$this->delete(array('app_id'=>$id,'app_state'=>0));
					}
				break;
			}
			case 'quxiao':{
				 foreach ($_POST['app_id'] as $id){
					 	$this->update(array('app_state'=>0),array('app_id'=>$id));
					 }
				
			}
		}
		
		
	}
	
	
	public function getItemData(){
		$sql = 'select app_id,app_stud_no,stud_class,stud_name,app_item_code,app_time,app_state,app_item_type,item_name,item_rank,item_score  ';
		$sql .='from item_apply,item_set,stud_baseinfo where stud_baseinfo.stud_no = item_apply.app_stud_no and item_apply.app_item_code = item_set.item_code ';
		$cond =null;
		if($_SESSION['admin_super'] != 1){
			
			
			if($_SESSION['admin_org_code'] == DFADMIN){
				$sql .= ' and ( 0 ';
				$this->setTableName('group_dept');
				$dfdata = $this->selectA(array('dept_father_id'=>DFADMIN));
				foreach($dfdata as $v){
					$sql .=' or item_apply.stud_orgcode =  '.$v['id'];
				}
				$sql .=' ) ';
			}else{
				$sql .=' and item_apply.stud_orgcode =  '.$_SESSION['admin_org_code'];
			}
			
		}
		if($_GET['s'] != 10) $sql.=" and item_apply.app_state = {$_GET['s']} "; 
		$sql .=' order by app_time DESC';
		
		return $this->executeQueryA($sql,null,20,$this->pn-1);
	}
	
	public function makepage(){
		$this->setTableName('item_apply');
		$num = $this->count();
		$page = ceil($num/20);
		$nextpage = $this->pn+1<=$page?$this->pn+1:$this->pn;
		$str = "共{$num}记录&nbsp;第{$this->pn}页/共{$page}页&nbsp;<a href='itemlist.php?pn=$nextpage&s={$_GET['s']}'>下一页</a>&nbsp;<a href='itemlist.php?pn=$page&s={$_GET['s']}'>末页</a>";
		$str .="&nbsp;&nbsp;&nbsp;&nbsp;<select name='select' onchange=\"location.href='itemlist.php?pn='+this.options[this.selectedIndex].value+'&s={$_GET['s']}' \">";
		for($i=1;$i<$page+1;$i++){
			if($i == $this->pn) {
				$str .="<option value='$i' selected>$i</option>";
				continue;
			}
			$str .="<option value='$i' >$i</option>";
		}
		$str .="</select>";
		echo $str;
	}
	
	
	
}

