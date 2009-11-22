<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生密码修改首页
///
///	[Description]
///		学生密码修改页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

   require_once("include/mysqldao.php");
        class pwdchg extends MysqlDao_b
        {
             public function showitem($studno)
             {
       
                 $this->setTableName("stud_baseinfo");
                 $data=array("stud_no"=>$studno); 			//查询学号
    			 $row=$this->select($data);
    		//	 print_r($row);
                 return $row;
             }
             public function pwdupdate($studno,$newpwd)
             {
                 $this->setTableName("stud_baseinfo");
                 $data=array("stud_password"=>$newpwd);
                 $cond = array("stud_no"=>$studno);
               
                 $row=$this->update($data,$cond);
             }
        }