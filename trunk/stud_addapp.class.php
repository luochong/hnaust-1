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


      require_once("include/mysqldao.php");	
      require_once("include/function.include.php");	
      
      class selitem extends MysqlDao_b
      {
         
          public function seltype($itype)
          {
              $ttype=getItemType($itype);
             
               // echo $ttype;
             $sql="select item_name,item_code from item_set where item_type='$ttype' " ;			//查询类型

             $row=$this->executeQuery($sql);
         //  print_r($row);
	       	return $row;
          }
          
          public function insertapp($atype,$acode,$studno,$studcode,$showtime)
          {
               $ttype=getItemType($atype);
               $trank=getRank($irank);
              
                 $this->setTableName("item_apply");
              
                 //echo $ttype;
                 $data=array("app_item_type"=>$ttype,"app_item_code"=>$acode,"app_stud_no"=>$studno,"stud_orgcode"=>$studcode,"app_time"=>$showtime); 			//查询学号
    			 $row=$this->insert($data);
    		
                 return $row;
    		
          }
          public function finditem($itemcode)
          {
                 $this->setTableName("item_set");
                // echo $itemcode;
                 $data=array("item_code"=>$itemcode); 			//查询学号
    			 $row=$this->select($data);
                 return $row;
          }
          public function setitem($atype,$iname,$irank)
          {
         
              $ttype=getItemType($atype);
              $trank=getRank($irank);
            
              $sql="select item_code from item_set where item_type='$ttype' and item_rank='$trank' and item_name='$iname' " ;			//查询类型
              $row=$this->executeQuery($sql);
              //  print_r($row);
	       	  return $row;
             
         //  print_r($row);
	       
    			 
                
          }
      } 
      
?>