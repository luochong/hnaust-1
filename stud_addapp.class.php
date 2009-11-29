<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请类
///
///	[Description]
///		学生项目申请类页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理


      require_once("include/mysqldao.class.php");	
      require_once("include/function.include.php");	
      
      class selitem extends MysqlDao
      {
         

          
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
          
 
          
          public function seltype($itype)
          {
              $ttype=getItemType($itype);
             
               // echo $ttype;
             $sql="select distinct item_name  from item_set  where item_type='$ttype'  " ;			//查询类型
             
             $row=$this->executeQueryA($sql);
        // print_r($row);
	       	return $row;
          }
   
  
          
          public function insertapp($itype,$code,$studno,$studcode)
          {
            
              
                 $this->setTableName("item_apply");
                  $data1=array("app_item_type"=>$itype,"app_item_code"=>$code,"app_stud_no"=>$studno,"stud_orgcode"=>$studcode); 			//
    			 $row1=$this->selectA($data1);
    			//print_r($row1);
               if($row1==null){
    			  $istat="0";
                 $data=array("app_item_type"=>$itype,"app_item_code"=>$code,"app_stud_no"=>$studno,"stud_orgcode"=>$studcode,"app_state"=>$istat); 			//查询学号
    	  
                 $row=$this->insert($data);
    		echo "<script language=javascript >\n";	
			echo "alert('提交成功')\n";
			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
             
               }
                 else{echo "<script language=javascript >\n";	
			echo "alert('提交项目已存在，请重新提交')\n";
			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
                     
                 }
          }
         
                public function setitem($atype,$iname,$irank)
          {
           
             
			 if($atype=="0"||$iname=="0"||$irank=="0")
              {	echo "<script language=javascript >\n";	
			echo "alert('项目为空，不能提交')\n";
			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
              }
          
              else{
               
                  if($atype=="求实"||$atype=="求特"||$iname=="参加学校组织的大学生课外学术科技作品竞赛"||$iname=="参加学校组织的大学生课外学术科技作品竞赛"||$iname=="职业规划大赛"||$iname=="就业力挑战赛"||$iname=="积极组织参与大学生文明修身活动")
                  {
             
                    echo "<script language=javascript >\n";	
        			echo "alert('该项目由校团委申报，不允许个人提交')\n";
        			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
        			echo "</script>\n";
                  }
    			    else {
                  $sql="select item_code from item_set where item_type='$atype' and item_rank='$irank' and item_name='$iname' " ;			//查询类型
                  $row=$this->executeQueryA($sql);
                //print_r($row);
    	       	  return $row;
    			    }
                  }
			 }
			 
}
     
    
?>