<?php 
///	[Product]
///		
///
///	[Copyright]
///		Copyright 2009 prolove. All rights reserved.
///
///	[Filename]
///		syst_adduser.class.php
///
///	[Description]
///		
///
///	[History]
///		Date         Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/18    1.0.0    	 DengZhuo	

require_once("../../include/mysqldao.class.php");	
//error_reporting(E_ALL ^ E_NOTICE);

class addSchOrg extends MysqlDao 
{
	public function add_org()
	{
		$array['dept_father_id']=$_POST['father_id'];	
		$flag=1;
		for($i=1;$i<=5;$i++){
			$str="dept_name".$i;
			$dept_name=$_POST['$str'];
			if($dept_name!=""){
				$time=uniqid(rand());//gettimeofday(usec).$i;
				$array['dept_name']=$dept_name;
               	//二级及以下分类部门/机构
				$dept_id=$array['dept_father_id'];
				$this->setTableName("group_dept");
				$cond = array("id" => $dept_id);
				$array_dept=$this->select($cond);


				$array['dept_father_name']=$array_dept[0]['dept_name'];   //上级部门名称				
				$array['dept_tree_name']=$array_dept['dept_tree_name']."->".$array['dept_name'];//上级部门亲缘关系树（名称）												
					

				$array['dept_sub']=$time;     
				$array['dept_sub_tree']="*:".$time;
				$table="group_dept";
				$this->setTableName("group_dept");
				$resu = $this->insert($array);
			 //   $resu=$db->db_insert($table,$array);			
				if(!$resu){
					$flag=0;
				}
				else{
					
				}
			}
		}
		if($flag){  
			echo "<script language=javascript>\n";	
			echo "alert('成功添加部门')\n";
			echo "window.location.href='grouAdd02.php'";		
			echo "</script>\n";
		}
		else{
			echo "fail";
		}
		
		
		
	
	}
	
}
?>