<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页类
///
///	[Description]
///		学生项目申请首页类页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理


       require_once("include/mysqldao.php");	
       
         class stud extends MysqlDao_b
         {
             public $itemcode;
             public function showstud($studno)
             {
                 
     
             $this->setTableName("stud_baseinfo");
             $data=array("stud_no"=>$studno); 			//查询学号
			 $row=$this->select($data);
             return $row;
             }
             
             public function showitem($studno)
             {
                 $this->setTableName("item_apply");
                 $data=array("app_stud_no"=>$studno);
                 $row=$this->select($data);
    
                 return $row;
             }
             public function finditem($itemcode)
             {
                  $this->setTableName("item_set");
               for($i=0;$i<count($itemcode);$i++)
               { 
               
                   $data[]=array("item_code"=>$itemcode[$i]);
              
             //  print_r($data);
                 $row[]=$this->select($data);
                  }
              // print_r($row);
                 return $row;
             }
             
         }

?>
