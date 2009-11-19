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
      
      class selitem extends MysqlDao_b
      {
          public function seltype($itype)
          {
           
          switch ($itype)
               {
                 	case '1':$ttype="真";break;
                  	case '2':$ttype="善";break;
             	    case '3':$ttype="美";break;
       	            case '6':$ttype="强";break;
               }
               // echo $ttype;
             $sql="select item_name from item_set where item_type='$ttype' " ;			//查询类型

             $row=$this->executeQuery($sql);
          //   print_r($row);
	       	return $row;
          }
      } 
      
?>