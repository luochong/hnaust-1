<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目删除首页
///
///	[Description]
///		学生项目删除页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

        require_once("include/mysqldao.php");	
        require_once("include/function.include.php");	
        header('Content-Type:   text/html;   charset=utf-8');
        	$host = $_SERVER['HTTP_HOST'];
        
        class itemdel extends MysqlDao_b
        {
            public function idel($icode)
            {
                $this->setTableName("item_apply"); 		//设置表名
               // echo $icode;
			    $data0=array("app_item_code"=>$icode);				//设置条件
               $row0=$this->select($data0);
               $data=array("app_item_code"=>$icode);
              // print_r($row0);
               if($row0[0][4]==0){
                   $row = $this->delete($data);  			//执行dao函数
                    echo "<script language=javascript >\n";	
        			echo "alert('已删除，请重新提交')\n";
        			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
        			echo "</script>\n";
               }
               else{
                    echo "<script language=javascript >\n";	
        			echo "alert('改项目已审核无法删除')\n";
        			echo "history.go(-1)\n;";   //跳出框架 重定向到登录页面
        			echo "</script>\n";
               }
            }
            
            
        }
        $citemdel=new itemdel();
    //    echo $_GET['code'];
        $citemdel->idel($_GET['code']);