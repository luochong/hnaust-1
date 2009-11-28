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
         
          public function seltype($itype)
          {
              $ttype=getItemType($itype);
             
               // echo $ttype;
             $sql="select distinct item_name  from item_set  where item_type='$ttype'  " ;			//查询类型
             
             $row=$this->executeQuery($sql);
        // print_r($row);
	       	return $row;
          }
   
          
          public function insertapp($atype,$acode,$studno,$studcode)
          {
               $ttype=getItemType($atype);
              
                 $this->setTableName("item_apply");
                  $data1=array("app_item_type"=>$ttype,"app_item_code"=>$acode,"app_stud_no"=>$studno,"stud_orgcode"=>$studcode); 			//
    			 $row1=$this->selectA($data1);
    			 //print_r($row1);
               if(!$row1){
    			  $istat="0";
                 $data=array("app_item_type"=>$ttype,"app_item_code"=>$acode,"app_stud_no"=>$studno,"stud_orgcode"=>$studcode,"app_state"=>$istat); 			//查询学号
    	  
                 $row=$this->insertA($data);
    		echo "<script language=javascript >\n";	
			echo "alert('提交成功')\n";
			echo "history.go(-2)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
             
               }
                 else{echo "<script language=javascript >\n";	
			echo "alert('提交项目已存在，请重新提交')\n";
			echo "history.go(-2)\n;";   //跳出框架 重定向到登录页面
			echo "</script>\n";
                     
                 }
          }
          public function finditem($atype,$iname)
          {
               $ttype=getItemType($atype);
         
                 $sql="select  item_rank from item_set where item_type='$ttype'  and item_name='$iname' " ;			//查询类型
              $row=$this->executeQuery($sql);
              // print_r($row);
	       	  return $row;
          }
                public function setitem($atype,$iname,$irank)
          {
         
              $ttype=getItemType($atype);
              $trank=getRank($irank);
            
              $sql="select  item_code from item_set where item_type='$ttype' and item_rank='$trank' and item_name='$iname' " ;			//查询类型
              $row=$this->executeQuery($sql);
              //  print_r($row);
	       	  return $row;
        
          }
      } 
      
?>