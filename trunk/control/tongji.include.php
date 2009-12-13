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
		$num = 0;
		$this->setTableName('item_apply');
		$num =  $this->count(array('app_stud_no'=>$id,'app_state'=>2));
		return $num;
	}
	/*
	总申报学分  所以的申报的学分求和    通过审核
	*/
	public function countAllCreditByStudId($id){
		$sql = 'select sum(item_score) from item_set,item_apply where item_set.item_code = item_apply.app_item_code AND app_state = 2 AND item_apply.app_stud_no = "'.$id.'"';
		return current(current($this->executeQuery($sql)));
	}
	
    /* 有效申报学分   同一奖取最高学分 求和  */
    public function countValidCreditByStudId($id){
    	$allcode = array();
    	$allcode = current($this->simpleFetchList(' item_apply ',array(' app_item_code '),array('app_stud_no'=>$id,'app_state'=>2)));
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
    public function countLessonCredit($id,$is_lession = false){
    	/****************  求出有效项目编号   *****************/
    	$lessoncredit = array();
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
    	if($is_lession){
	    	if($lessoncredit["求实"]<2){
	    		unset($lessoncredit["求实"]);
	    	}
	    	
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
    
        public function getBYSNO(){
    	 date_default_timezone_set('Asia/Shanghai');
		 $now = $this->getYear();
    	 $sql = "select distinct app_stud_no as  sno,stud_name   from item_apply,stud_baseinfo where app_state = 2 and item_apply.app_stud_no = stud_baseinfo.stud_no and stud_baseinfo.stud_deadline =  ".$now;
    	 return $this->executeQueryA($sql);
    }
    public function getCNO(){
    	$sql = "select distinct item_apply.stud_orgcode  as org_no ,dept_name as org_name from item_apply,group_dept,stud_baseinfo where item_apply.stud_orgcode = id and app_stud_no = stud_no and stud_baseinfo.stud_college != '东方院'";
    	
    	return $this->executeQueryA($sql);
    }
    
    public function getYear(){
    	
	    date_default_timezone_set('Asia/Shanghai');
		return date("Y");
    }
    
    /***********************所有学生年度统计  **************************/
    
    /**
     * Enter description here...
     *
     */
    public function countItemByOrgId($org,$time){
    	$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where item_apply.stud_orgcode = $org  and stud_baseinfo.stud_college!='东方院' and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) >= {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]}";
    	return current($this->executeQueryA($sql));
    }
    /**
     * Enter description here...
     *
     */
	

    /**
     * 统计各学院有效学分 每年统计一次
     *
     * @param unknown_type $org_code
     * @return unknown
     */
    public function countValidCreditANDLessonCreditByOrg($org_code,$time){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where item_apply.stud_orgcode = $org_code  and stud_baseinfo.stud_college!='东方院'  and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) > {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]} ";
    	$sno = $this->executeQueryA($sql);
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    /**
     * 统计各学院毕业生有效学分
     *
     * @param unknown_type $org_code
     * @return unknown
     */
 public function countBValidCreditANDLessonCreditByOrg($org_code){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where item_apply.stud_orgcode = $org_code  and stud_baseinfo.stud_college!='东方院'  and app_state = 2 and stud_no = app_stud_no and stud_deadline = ?  ";
    	$sno = $this->executeQueryA($sql,array($this->getYear()));
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    
	public function countBItemByOrgId($org){
	    	$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where item_apply.stud_orgcode = $org  and stud_baseinfo.stud_college!='东方院' and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and stud_deadline <= ".$this->getYear();
	    	return current($this->executeQueryA($sql));
	    }
	
	/**
	 * 东方统计
	 *
	 */
   public function countDFItem($time){
		$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where  stud_baseinfo.stud_college='东方院' and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) > {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]} ";
		
		return current($this->executeQueryA($sql));
	}
	
   public function countDFValidCreditANDLessonCreditByOrg($time){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where stud_baseinfo.stud_college='东方院' and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) > {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]} ";
    	$sno = $this->executeQueryA($sql);
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    
   public function countBDFItem(){
	$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where  stud_baseinfo.stud_college='东方院' and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and stud_deadline = ".$this->getYear();
   	return current($this->executeQueryA($sql));
   }
	
   public function countBDFValidCreditANDLessonCreditByOrg(){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where stud_baseinfo.stud_college='东方院' and app_state = 2 and stud_no = app_stud_no and stud_deadline = ?  ";
    	$sno = $this->executeQueryA($sql,array($this->getYear()));
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    
    
    public function getDFXID(){
    	$sql = "select distinct item_apply.stud_orgcode  as org_no ,dept_name as org_name from item_apply,group_dept,stud_baseinfo where item_apply.stud_orgcode = id and app_stud_no = stud_no and stud_baseinfo.stud_college = '东方院'";
    	
    	return $this->executeQueryA($sql);
    }
    
    //东方各系所有统计
    public function countDFXItemByOrgId($org,$time){
	    	$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where item_apply.stud_orgcode = $org  and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) > {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]} ";
	    	return current($this->executeQueryA($sql));
	}
	public function countDFXValidCreditANDLessonCreditByOrg($org_code,$time){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where item_apply.stud_orgcode = $org_code   and app_state = 2 and stud_no = app_stud_no and UNIX_TIMESTAMP(item_apply.app_time) > {$time[0]} and  UNIX_TIMESTAMP(item_apply.app_time) < {$time[1]} ";
    	$sno = $this->executeQueryA($sql);
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    
    /**
     * 东方各系毕业统计
     *
     * @param unknown_type $org
     * @return unknown
     */
    
    public function countBDFXItemByOrgId($org){
	    	$sql = "select count(*) as item_count,sum(item_score) as score_count,count(distinct app_stud_no) as stud_count from item_apply,item_set,stud_baseinfo where item_apply.stud_orgcode = $org  and item_code = app_item_code and app_state = 2 and stud_no = app_stud_no and stud_deadline = ".$this->getYear();
	    	return current($this->executeQueryA($sql));
	}
	public function countBDFXValidCreditANDLessonCreditByOrg($org_code){
    	$sql = "select distinct app_stud_no as sno from item_apply,stud_baseinfo where item_apply.stud_orgcode = $org_code and app_state = 2 and stud_no = app_stud_no and stud_deadline = ?  ";
    	$sno = $this->executeQueryA($sql,array($this->getYear()));
    	$c = 0;//有效学分
    	$lc = 0;//课程有效学分
    	foreach ($sno as $v){
    		$c += $this->countVerifyValidCreditByStudId($v['sno']);
    				$data = $this->countLessonCredit($v['sno']);
    				foreach ($data as $d){
    					$lc +=$d['mark_lesson_score'];
    				}
    	}
    	$all['credit'] = $c;
    	$all['lcredit'] = $lc;
    	return $all;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}

