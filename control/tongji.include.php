<?php 
class Tongji extends MysqlDao {
	
	public $maxcredit;
	/* 单个学生的统计     */
	/**
	 * 总申报项目数
	 *
	 * @param unknown_type $id
	 * @return unknown
	 */
	public function countItemByStudId($id){
		$this->setTableName('item_apply');
		return $this->count(array('app_stud_no'=>$id,'app_state'=>2));
	}
	/*
	总申报学分  所以的申报的学分求和
	*/
	public function countAllCreditByStudId($id){
		$sql = 'select sum(item_score) from item_set,item_apply where item_set.item_code = item_apply.app_item_code AND app_state = 2 AND item_apply.app_stud_no = "'.$id.'"';
		return current(current($this->executeQuery($sql)));
	}
	
    /* 有效申报学分   同一奖取最高学分 求和  */
    public function countValidCreditByStudId($id){
    	$allcode = current($this->simpleFetchList(' item_apply ',array(' app_item_code '),array('app_stud_no'=>$id)));
    	$validcode = $this->makeValidItemCode($allcode);
    	$sql = 'select sum(item_score) from item_set where 0   ';
    	foreach ($validcode as $v){
    		$sql .=' or item_code = ?';
    	}
    	return current(current($this->executeQuery($sql,$validcode)));
    	
    }
    /*
	   通过审核的   有效申报学分  
    */
    public function countVerifyValidCreditByStudId($id){
    	$validcode = $this->makeValidItemCode($this->getVerifyValidAllCode($id));
    	$sql = 'select sum(item_score) from item_set where  0   ';
    	foreach ($validcode as $v){
    		$sql .=' or item_code = ? ';
    	}
    	return current(current($this->executeQuery($sql,$validcode)));
    }
    /**
     * 项目学分转化成课程学分
     * 
     * return array('真'=>学分,'实'=>学分);
     */
    public function countLessonCredit($id){
    	/****************  求出有效项目编号   *****************/
    	$validcode = $this->makeValidItemCode($this->getVerifyValidAllCode($id));
    	$sql = 'select sum(item_score) as sum,item_type from item_set where  0   ';
    	foreach ($validcode as $v){
    		$sql .=' or item_code = ? ';
    	}
    	$sql.='group by item_type ';
    	$rows = $this->executeQueryA($sql,$validcode);
    	/***    获得 array('真'=>学分,'实'=>学分)   ***/
    	
    	foreach ($rows as $row){
    		$lessoncredit[$row['item_type']] = $row['sum'];
    	}
    	
    	/****************求出最大课程学分数*********************/
    	if(empty($this->maxcredit)){
	    	$sql = 'select max(mark_lesson_score) as sum ,mark_lesson_type as item_type from mark_allscore  group by mark_lesson_type ';
	    	$rows = $this->executeQueryA($sql);
	    	foreach ($rows as $row){
	    		$this->maxcredit[$row['item_type']] = $row['sum'];
	    	}
    	}
    	/******************课程学分与项目学分规格化***********************/
    	if($lessoncredit["求实"]<2){
    		unset($lessoncredit["求实"]);
    	}
    	$sql = "select * from mark_allscore where 0 ";
    	foreach ($lessoncredit as $key => &$value){
    		if($value > $this->maxcredit[$key]){
    			$value = $this->maxcredit[$key];
    		}
    		$sql .="or (mark_lesson_type = '$key' and mark_lesson_score = $value) ";
    	
    	}
    	return $this->executeQueryA($sql);
    }
    /**
     * 生产有效项目序列
     * 
     */
    public   function makeValidItemCode($allcode){
    	$headecode = array();
    	$validcode = array();
    	$validcode1 = array();
    	$validcode2 = array();
    	for ($i=0;$i<count($allcode);$i++){
    		if(strpos($allcode[$i],'Q') !== FALSE){
	    		list($head,$foot) = explode('Q',$allcode[$i]);
	    		if(isset($headecode[$head])){
	    			if($headecode[$head] > $foot)
	    				$headecode[$head] = $foot;
	    		}else{
	    			$headecode[$head] = $foot;
	    		}
    		}else{
    			$validcode1[] = $allcode[$i];
    		}
    	}
    	
    	foreach ($headecode as $key=>$value){
    		$validcode2[] = $key.'Q'.$value;
    	}
    	$validcode = array_merge($validcode1,$validcode2);
    	return $validcode;
    	
    }
    /**
     * 获得所有的通过的项目编号 
     *
     * @param 学号 $id
     * @return unknown
     */
    
    public function getVerifyValidAllCode($id){
    	$code = $this->simpleFetchList(' item_apply ',array(' app_item_code '),array('app_stud_no'=>$id,'app_state'=>2));
    	foreach ($code as $c){
    		$d[] = $c[0];
    	}
    	return $d;
    }
    /**
	 * 学院总项目数
	 */
    public function countItemByOrgcode($id){
		
	
    
    
    }
    /**
     * Enter description here...
     *
     */
    
    public function getBYSNO(){
    	 date_default_timezone_set('Asia/Shanghai');
		 //$now = date("Y");
		 $now = '2011';
    	 $sql = "select distinct app_stud_no as  sno,stud_name   from item_apply,stud_baseinfo where app_state = 2 and item_apply.app_stud_no = stud_baseinfo.stud_no and stud_baseinfo.stud_deadline =  ".$now;
    	 return $this->executeQueryA($sql);
    }

    
    
}

