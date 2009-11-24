<?php 
include_once("../../include/mysqldao.class.php");
/**
 * 后台用户登录
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
	public function onclick(){
		$this->setTableName('item_apply');
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
				$time= 'app_coltime';
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
		$data = array();
		if(isset($_GET['submit'])){
			$sql = 'select app_id,app_stud_no,stud_name,stud_class,app_item_code,app_time,app_state,app_item_type,item_name,item_rank,item_score  ';
			$sql .='from item_apply,item_set,stud_baseinfo where stud_baseinfo.stud_no = item_apply.app_stud_no and item_apply.app_item_code = item_set.item_code ';
			//s_no=&s_name=&i_code=&i_type=&i_state=10&i_score=&i_org=
			if(!empty($_GET['s_no'])){
				$sql.=' and stud_no="'.$_GET['s_no'].'"';
			}
			if(!empty($_GET['i_code'])){
				$sql.=' and item_set.item_code="'.$_GET['i_code'].'"';
			}
			if(!empty($_GET['i_type'])){
				$sql.=' and item_set.item_type="'.$_GET['i_type'].'"';
			}			
			if($_GET['i_state']!==''&&$_GET['i_state']!=10){
				$sql.=' and item_apply.app_state='.$_GET['i_state'];
			}
			if(!empty($_GET['i_org'])&&$_SESSION['admin_super']==1){
				$sql.=' and item_apply.stud_orgcode='.$_GET['i_org'];
			}else{
				$sql.=' and item_apply.stud_orgcode='.$_SESSION['admin_org_code'];
			}
			if(!empty($_GET['i_score'])){
				$sql.=' and item_score ='.$_GET['i_score'];
			}
			if(!empty($_GET['s_name'])){
				$sql.=' and stud_name ="'.$_GET['s_name'].'"';
			}			
			$sql .=' order by app_time DESC';
			$this->sql = $sql;
			$data =  $this->executeQueryA($sql,null,20,$this->pn-1);
		}
		return $data;
	}
	
	public function makepage(){
		if(isset($_GET['submit'])){
			$get = "s_no={$_GET['s_no']}&s_no={$_GET['s_name']}&i_code={$_GET['i_code']}&i_type={$_GET['i_type']}&i_state={$_GET['i_state']}&i_score={$_GET['i_score']}&i_org={$_GET['i_org']}&submit={$_GET['submit']}";
			$this->sql;
			$sql = 'select count(*) from '.end(explode('from',$this->sql));
			$num = current(current($this->executeQuery($sql)));
			$page = ceil($num/20);
			$nextpage = $this->pn+1<$page?$this->pn+1:$this->pn;
			$str = "共$num记录&nbsp;第$this->pn页/共$page页&nbsp;<a href='itemsearch.php?pn=$nextpage&$get'>下一页</a>&nbsp;<a href='itemsearch.php?pn=$page&$get'>末页</a>";
			$str .="&nbsp;&nbsp;&nbsp;&nbsp;<select name='select' onchange=\"location.href='itemsearch.php?pn='+this.options[this.selectedIndex].value+'&$get' \">";
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
		
		
		
		
}

