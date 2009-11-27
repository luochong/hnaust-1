<?php 
include_once("../../include/mysqldao.class.php");
require_once("../../include/function.include.php");
/**
 * 后台新闻添加
 * luochong 2009 11
 *
 */
class NewsListAction extends MysqlDao {
	
	public $error_message= '';
	public $pn;
	public function run(){
		if(!empty($_GET['ac'])&&method_exists($this,$_GET['ac'])){
			$this->$_GET['ac']();
		}
		$this->pn = isset($_GET['pn'])?(intval($_GET['pn'])):1;
	}
	
	public function getListData(){
		if($_SESSION['admin_super'] == 1){
			$sql = 'select * from news,user_admin where user_admin.user_id = news.news_user';
			$data = $this->executeQueryA($sql,null,20,$this->pn-1);
		}else{
			$sql = 'select * from news,user_admin where user_admin.user_id = news.news_user and news_user = ?';
			$data = $this->executeQueryA($sql,array($_SESSION['admin_id']),20,$this->pn-1);
		}
		return $data;
	}
	public function passnews(){
		$id = intval($_GET['id']);
		$this->setTableName('news');
		$d = $this->selectA(array('news_id'=>$id));
		if($d[0]['news_state'] == 0){
			$s  = 1;
		}else{
			$s = 0;
		}
		$this->update(array('news_state'=>$s),array('news_id'=>$id));
		
	}
	
	
	public function makepage(){
		$this->setTableName('news');
		$num = $this->count();
		$page = ceil($num/20);
		$nextpage = $this->pn+1<=$page?$this->pn+1:$this->pn;
		$str = "共$num记录&nbsp;第$this->pn页/共$page页&nbsp;<a href='newslist.php?pn=$nextpage'>下一页</a>&nbsp;<a href='newslist.php?pn=$page'>末页</a>";
		$str .="&nbsp;&nbsp;&nbsp;&nbsp;<select name='select' onchange=\"location.href='newslist.php?pn='+this.options[this.selectedIndex].value \">";
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
	
	