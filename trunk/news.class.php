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
        include_once("include/mysqldao.class.php");	
        require_once("include/function.include.php");	
       define(PageNum,20);
        class news extends MysqlDao 
        {
            public function getnewsinfo($pageno)
            {
                 $this->setTableName("news");
                   $page_no=$pageno-1;
                 $data=array("news_state"=>1);
                 $row=$this->selectA($data,PageNum,$page_no,'news_time DESC');
                 return $row;
            }
              public function indextitle()
            {
                 $this->setTableName("news");
               
                 $data=array("news_state"=>1);
                 $row=$this->selectA($data,9,0,'news_time DESC');
                 return $row;
            }
                public function getnewscont($newsid)
            {
                 $this->setTableName("news");
               
                 $data=array("news_id"=>$newsid);
                 $row=$this->selectA($data);
                 return $row;
            }
               public function page_list()
		{
		    
		    $page=basename($_SERVER['PHP_SELF']);
		    $http_str = $_SERVER['QUERY_STRING'];  //url中
			$this->setTableName("news");
			   $data=array("news_state"=>1);
                 $row=$this->selectA($data);
                 $nums=count($row);
               
			
			
            $page_nums  =ceil($nums/PageNum);        //总页数           
			      
			      //echo "page_no=".$page_no;
			
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
			for($i=1;$i<=$page_nums;$i++)
			{
				if($i == $page_no )echo "<option value='$i' selected>$i</option>";
					else echo "<option value='$i'>$i</option>";				
			}	    	
	    	echo "</select>";
			
		}	
}
?>