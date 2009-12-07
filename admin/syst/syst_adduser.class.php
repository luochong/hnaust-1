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
error_reporting(E_ALL ^ E_NOTICE);

class operadd extends MysqlDao 
{
	public function showDeptList()
	{
	/*	$space="";
		$this->setTableName('group_dept');
		$cond = array("dept_father_id" => '0');
		$row = $this->selectA($cond);			
		for($i=0;$i<count($row);$i++){
			$value=$row[$i]["id"];			
			echo "<option value='$value'>$space{$row[$i]["dept_name"]}</option>";
			$this->subdept($row[$i]["id"],$space);
		}	*/
		$this->setTableName('group_dept');
		$cond = array("dept_father_id" => '0');
		$row = $this->selectA($cond);	
		for($i=0;$i<count($row);$i++){
			$value=$row[$i]["id"];	
			if($_GET['dept_name']==$value){
				echo "<option value='$value' selected=\"selected\">{$row[$i]["dept_name"]}</option>";
			}else{		
				echo "<option value='$value'>{$row[$i]["dept_name"]}</option>";
			}
		}
	
	}
	
	public function showChilddeptList()
	{
		$this->setTableName('group_dept');

		$cond = array("dept_father_id" => $_GET['dept_name']);
		print_r($cond);
		$row = $this->selectA($cond);	
		for($i=0;$i<count($row);$i++){
			$value=$row[$i]["id"];	
			if($_GET['dept_name']==$value){
				echo "<option value='$value' selected=\"selected\">{$row[$i]["dept_name"]}</option>";
			}else{		
				echo "<option value='$value'>{$row[$i]["dept_name"]}</option>";
			}
		}
	}
	
	
	public function subdept($id,$space)
	{	
		$this->setTableName("group_dept");
		$cond = array("dept_father_id" => $id);
		$row = $this->selectA($cond);
		if(count($row)>=1){
			for($i=0;$i<count($row);$i++){
				$value=$row[$i]["id"];			
				echo "<option value='$value'>$space{$row[$i]["dept_name"]}</option>";
				$this->subdept($row[$i]["id"],$space);
			}
		}else{
			echo "<option value=''>无下属机构</option>";
		}
	}
	

	public function addoper()
	{
		
		$array["admin_user"] = $_POST['username'];
		$sql="select * from user_admin where user_name='$array[admin_user]'";
		$row = $this->executeQueryA($sql);	
		if(count($row)>=1)
		{
			echo "<script language=javascript>\n";	
			echo "alert('系统中存在相同名字的管理用户,请重新设置')\n";
			echo "history.back(-1)\n";
			echo "</script>\n";
			exit;
		}
		else
		{
			$array['userpwd'] = $_POST['userpwd'];
			print_r($_POST);
			if(!empty($_POST['dept_cname'])){
				$array['dept_mname'] = $_POST['dept_cname'];
			}else 
			{
				$array['dept_mname'] = $_POST['dept_fname'];
			}
			if( $_POST['modu_item'] == "check")$modu_item = "1";else $modu_item = "0";
			if( $_POST['modu_news'] == "check")$modu_news = "1";else $modu_news = "0";
			if( $_POST['modu_syst'] == "check")$modu_syst = "1";else $modu_syst = "0";
			

			$array['admin_modu_limit']= $modu_item.$modu_news.$modu_syst;				
			$this->setTableName('user_admin');
		
			$cond = array("user_name" => $array["admin_user"],
							"user_password" => $array['userpwd'],
							"user_org_code" => $array['dept_mname'],
							"user_mode" => $array['admin_modu_limit']);	

			$resu = $this->insert($cond);
			
			if($resu)
			{  
				echo "<script language=javascript>\n";	
				echo "alert('成功添加操作员')\n";
				echo "window.location.href='syst_adduser.php'";		
				echo "</script>\n";
			}
			else{
				echo "<script language=javascript>\n";	
				echo "alert('添加部门失败')\n";
				echo "window.location.href='grouAdd02.php'";		
				echo "</script>\n";
			}
		}
	}
}
?>
