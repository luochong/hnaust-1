<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台新闻添加
 * luochong 2009 11
 *
 */
class NoticListAction extends MysqlDao {
	
	public $error_message= '';
	public $pn;
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
		$this->pn = isset($_GET['pn'])?(intval($_GET['pn'])):1;
	}
	
	public function getListData(){
		
		$sql = 'select * from notic,user_admin where user_admin.user_id = notic.notic_user';
		$data = $this->executeQueryA($sql,null,20,$this->pn-1);
		return $data;
	}
	
	public function delet(){
		$id = intval($_GET['id']);
		$this->setTableName('notic');
		$this->delete(array('notic_id'=>$id));
		
	}
	
	
	public function makepage(){
		$this->setTableName('notic');
		$num = $this->count();
		$page = ceil($num/20);
		$nextpage = $this->pn+1<=$page?$this->pn+1:$this->pn;
		$str = "共$num记录&nbsp;第$this->pn页/共$page页&nbsp;<a href='noticlist.php?pn=$nextpage'>下一页</a>&nbsp;<a href='noticlist.php?pn=$page'>末页</a>";
		$str .="&nbsp;&nbsp;&nbsp;&nbsp;<select name='select' onchange=\"location.href='noticlist.php?pn='+this.options[this.selectedIndex].value \">";
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
	
	