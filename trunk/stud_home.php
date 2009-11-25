<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页
///
///	[Description]
///		学生项目申请首页页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
require("include/sessionstud.php");
require("include/function.include.php");
require("stud_home.class.php");
//echo $_SESSION["studno"];
$studno=$_SESSION["studno"];
$show=new stud();
$pageno=$_GET['page_no'];
//$studid=2007;
$showinfo=$show->showstud($studno);
$showitem=$show->showitem($studno,$pageno);
for($i=0;$i<count($showitem);$i++)
{
   
        $itemcode[]=$showitem[$i][2];
    
}
//print_r($itemcode);
$itemdetail=$show->finditem($itemcode,$pageno);

$_SESSION['stud_no']=$showinfo[0][1];
$_SESSION['stud_name']=$showinfo[0][2];
$_SESSION['stud_sex']=$showinfo[0][3];
$_SESSION['stud_']=$showinfo[0][4];
$_SESSION['stud_no']=$showinfo[0][5];
$_SESSION['stud_no']=$showinfo[0][6];
$_SESSION['stud_no']=$showinfo[0][7];

include_once('include/mysqldao.class.php');
require_once('control/tongji.include.php');
$tongji = new Tongji();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>首页</title>
<link href="login.css" rel="stylesheet" type="text/css">
<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="background">
		<div id="headimg">
		<div id="header"></div>
		<div id="title">
			<ul>
				<li><a class="tit" href="stud_home.php" style="text-decoration:none">首&nbsp;页</a></li>
				<li><a class="tit" href="stud_addapp.php" style="text-decoration:none">项目申报</a></li>
				<li><a class="tit" href="#" style="text-decoration:none">资料下载</a></li>
				<li><a class="tit" href="stud_pwdchg.php" style="text-decoration:none">修改密码</a></li>
				<li><a class="tit" href="index.php" style="text-decoration:none">退出系统</a></li>
			</ul>
		</div>
		</div>
		<div class="clear"></div>
		<div id="left">
			<div id="left1">
				<div id="denglu">学生信息</div>
				<div id="user_login"><?php
             if(count($showinfo)!==0)
             {
              
                ?>学号：<?php  echo $showinfo[0][1];?>
                  <br>姓名：<?php  echo $showinfo[0][2];?>
                  <br>性别：<?php  echo $showinfo[0][3];?>
                  <br>学院：<?php  echo $showinfo[0][4];?>
                  <br>入学年份：<?php  echo $showinfo[0][5];?>
                  <br>班级：<?php  echo $showinfo[0][6];?>
                  <br>申报截止日期：<?php  echo $showinfo[0][7];?>
                     
          <?php    
             } 
            
           
?>
				</div>
			</div>
			<div id="left2">
				<div id="left_info_title">通知</div>
				<div id="left_inform"><MARQUEE onmouseover=this.stop(); onmouseout=this.start(); direction=up height=140 width=150 		scrollAmount=1 scrollDelay=1><a class='info' href='#' title='关于...的通知1'>关于...................的通知1</a><br><br><a class='info' href='#' title='关于...的通知2'>关于..................的通知2</a><br><br><a class='info' href='#' title='关于...的通知3'>关于..................的通知3</a><br><br><a class="info" style="text-decoration:none" href='#' title='关于...的通知4'>关于................的通知4</a><br><br><a class='info' href='#' title='关于...的通知5'>关于..................的通知5</a><br><br><a class='info' href='#' title='关于...的通知6'>关于........................的通知6</a></MARQUEE></div>
				<div id="more"><a class="info" style="text-decoration:none" href="#">more>></a></div>
			</div>
		</div>
		<div id="right">
		  <div id="item">
		  	<div id="location">
					<div id="location_tit">所在的位置：首页</div>
					<div id="showtime"><?php echo getNowTate()?></div>
				</div>
			<div id="choose">
					<div id="home_display_tit">已申报项目如下:</div>
					<div id="home_display_com">
				<table class="showtb1">
                     <tr>
                     <td class="showtd" width="8%">类别</td>
                     <td class="showtd" width="15%">编号</td>
                     <td class="showtd" width="30%">名称</td>
                     <td class="showtd" width="13%">级别</td>
                     <td class="showtd" width="8%">学分</td>
                     <td class="showtd" width="17%">审核状态</td>
                     <td class="showtd">操作</td>
                     </tr>
                </table>
		  <?php
           if(count($showitem)!==0)
                 {
                   for($n=0;$n<count($showitem);$n++)
                    {
           ?> 
               <table class="showtb2">
                     <tr>
                     	<td class="showtd" width="8%"><?php echo   $itemdetail[0][$n][1];?></td>
                         <td class="showtd" width="15%"><?php echo   $itemdetail[0][$n][2];?></td>
                         <td class="showtd" width="30%"><?php echo   $itemdetail[0][$n][3];?></td>
                         <td class="showtd" width="13%"><?php echo   $itemdetail[0][$n][4];?></td>
                         <td class="showtd" width="8%"><?php echo   $itemdetail[0][$n][5];?></td>
                         <td class="showtd" width="17%"><?php echo   getItemState($showitem[$n][4]);?></td>
                         <td class="showtd_x"><a onclick="return confirm('确认是否删除？')" href="stud_homedel.class.php?code=<?php echo   $itemdetail[0][$n][2];?>">×</a></td>
                     </tr>
                   </table>       
                    <?php           
         
                   }
                    $show->page_list($studno);
                 }
                 else 
                 {echo "你还未申请!";} 
?>
					</div>
			 	</div>
		  <div id="declare_info">
				<ul>
					<li><?php echo '总学分：',$tongji->countAllCreditByStudId($studno);?></li>
					<li><?php echo '总项目数：',$tongji->countItemByStudId($studno);?></li>
					<li><?php echo '有效学分：',$tongji->countValidCreditByStudId($studno);?></li>
					<li><?php echo '已获得有效学分：',$tongji->countVerifyValidCreditByStudId($studno);?></li>
				</ul>
		</div>
		  </div>
		</div>
	</div>
</body>

</html>
