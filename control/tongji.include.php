<?php 
require_once('../include/mysqldao.class.php');
class Tongji extends MysqlDao {
	
	public function student(){
		
		
		
	}
	
	
	
	
	
	public function countItemByStudId($id){
		$this->setTableName('item_apply');
		return $this->count(array('app_stud_no'=>$id));
	}
	
	/**
	 * 总申报项目数
	 *
	 * @param unknown_type $id
	 * @return unknown
	 */
	public function countItemByOrgcode($id){
		
		$this->setTableName('item_apply');
		return $this->count(array('stud_orgcode'=>$id));
	}
	
	/*
	总申报学分  所以的申报的学分求和
	*/
	
	public function countAllCreditByStudId($id){
		$sql = ' select sum(item_score) from item_set,item_apply where item_set.item_code = item_apply.app_item_code AND item_apply.app_stud_no = ?';
		return current(current($this->executeQuery($sql,array($id))));
	}
	
    /* 有效申报学分   同一奖取最高学分 求和  */
    public function countValidCreditByStudId($id){
    	$allcode = current($this->simpleFetchList(' item_apply ',array(' app_item_code '),array('app_stud_no'=>$id)));
    	$validcode = $this->makeValidItemCode($allcode);
    	$sql = ' select sum(item_score) from item_set where 0   ';
    	foreach ($validcode as $v){
    		$sql .=' or item_code = ?';
    	}
    	return current(current($this->executeQuery($sql,$validcode)));
    	
    }
    
    /*
		    
    */
    
    
    
    
    
    /**
     * 生产有效项目序列
     */
    public   function makeValidItemCode($allcode){
    	
    	$headecode = array();
    	$validcode = array();
    	for ($i=0;$i<count($allcode);$i++){
    		list($head,$foot) = explode('Q',$allcode[$i]);
    		if(isset($headecode[$head])){
    			if($headecode[$head] < $foot)
    				$headecode[$head] = $foot;
    			
    		}else{
    			$headecode[$head] = $foot;
    		}
    	}
    	
    	foreach ($headecode as $key=>$value){
    		$validcode[] = $key.'Q'.$value;
    	}
    	return $validcode;
    	
    }

    
    
    
    

}

