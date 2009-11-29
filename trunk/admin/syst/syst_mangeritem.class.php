<?php 
///	[Product]
///		
///
///	[Copyright]
///		Copyright 2009 prolove. All rights reserved.
///
///	[Filename]
///		syst_mangeruser.class.php
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
define("PageNum",10);

class mangeritem extends MysqlDao 
{
	public function item_manger()
	{
		$page_no = $_GET['page_no'];
		$this->setTableName("item_set");
		$cond = array("item_status" => '1');
		$row = $this->selectA($cond,PageNum,$page_no-1);
		$row1 = $this->selectA($cond);
		$row[0]['count'] = count($row1);
		return $row;
	}
	
	public function page($nums)
	{
		$page=basename($_SERVER['PHP_SELF']);
		$http_str = $_SERVER['QUERY_STRING'];  //url中传递的参数
		  	
        $page_nums  = ceil($nums/PageNum);        //总页数           
		      //echo "page_no=".$page_no;
		$page_no = $_GET['page_no'];
	    if($page_nums == 0)$page_nums = 1;
            if($page_no == "" || $page_nums < $page_no)$page_no = 1;
			echo "共".$nums."记录&nbsp;第".$page_no."页/共".$page_nums."页&nbsp;";
			if (!isset($_GET['page_no']) && $http_str!="")
			{
			    $http_str = $http_str."&";
			    if (isset($_GET['act']))
			    {
			      	$str1=$_GET['act'];
			      	$str2 = "act=".$str1;
//			      		$http_str = 
			      	$http_str=str_replace($str2,"",$http_str);
			    }
			      	
			    $page_text = $http_str."page_no";
			}
			else if ($http_str=="")
			{
			    $page_text="page_no";
			}
			else if(isset($_GET['page_no']))
			{
			    $str = $_GET['page_no'];
			    $t_str = "&page_no=".$str;
			    $str = str_replace($t_str,"",$http_str,$count);
			    $page_text = $str."&"."page_no";
			    if ($count < 1)
			    {
			      	$str = $_GET['page_no'];
			      	$t_str = "page_no=".$str;
			      	$str = str_replace($t_str,"",$http_str);
			      	$page_text = $str."page_no";			      			
			    }
			}
			
			if ($_GET['page_no'] > $page_nums && $_GET['page_no']!=1)
            {
            	$page_no = $_GET['page_no']-1;         //第几页
            	echo "<script language='javascript'>";
            	echo "window.location.href='$page?$page_text=$page_no'";
            	echo "</script>";
            }
            else
            {
			    $page_no    = $_GET['page_no'];			 //第几页	
			    if ($page_no=="")$page_no=1;
			}
			      		
			if( $page_no != 1 )
			{
            	$page_nob = $page_no - 1;
            	echo "<a href='$page?$page_text=1'>首页</a>&nbsp;<a href='$page?$page_text=$page_nob'>上一页</a>&nbsp;";
            }
            if($page_no != $page_nums)
			{
				$page_non = $page_no + 1;
				echo "<a href='$page?$page_text=$page_non'>下一页</a>&nbsp;<a href='$page?$page_text=$page_nums'>末页</a>";
            }
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<select name='select' onchange=\"location.href='$page?$page_text='+this.options[this.selectedIndex].value\">";
			for($i=1;$i<=$page_nums;$i++)/*type=$type&sear_str=$sear_str&*/
			{
				if($i == $page_no )echo "<option value='$i' selected>$i</option>";
					else echo "<option value='$i'>$i</option>";				
			}	    	
	    	echo "</select>";
	}	
	
}

?>