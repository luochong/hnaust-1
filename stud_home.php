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
require("stud_home.class.php");
//echo $_SESSION["studno"];
$studno=$_SESSION["studno"];
$show=new stud();

//$studid=2007;
$showinfo=$show->showstud($studno);
$showitem=$show->showitem($studno);
for($i=0;$i<count($showitem);$i++)
{
   
        $itemcode[]=$showitem[$i][2];
    
}
//print_r($itemcode);
$itemdetail=$show->finditem($itemcode);

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
                  姓名：<?php  echo $showinfo[0][2];?>
                  性别：<?php  echo $showinfo[0][3];?>
                  学院：<?php  echo $showinfo[0][4];?>
                  入学年份：<?php  echo $showinfo[0][5];?>
                  班级：<?php  echo $showinfo[0][6];?>
                  申报截止日期：<?php  echo $showinfo[0][7];?>
                     
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
		  <?php
		        echo '总学分：',$tongji->countAllCreditByStudId($studno);
                echo '总项目数：',$tongji->countItemByStudId($studno);
                echo '有效学分：',$tongji->countValidCreditByStudId($studno);
                echo '已获得有效学分：',$tongji->countVerifyValidCreditByStudId($studno);
		  ?>
		  <table>
                     <tr>
                     <td>类别</td>
                     <td>编号</td>
                     <td>名称</td>
                     <td>学分</td>
                     <td>审核状态</td>
                     <td>操作</td>
                  
                     </tr>
                     </table> 
		  <?php
           if(count($showitem)!==0)
                 {
                      // print_r($itemdetail);
                   for($n=0;$n<count($showitem);$n++)
                    {
           ?>   
             
                  <table>
                     <tr>
                         <td><?php echo   $itemdetail[0][$n][2];?></td>
                         <td><?php echo   $itemdetail[0][$n][3];?></td>
                         <td><?php echo   $itemdetail[0][$n][4];?></td>
                         <td><?php echo   $itemdetail[0][$n][5];?></td>
                         <td><?php echo   $itemdetail[0][$n][6];?></td>
                  
                     </tr>
                   </table>       
                              
                      
                    <?php           
                              
                    
                       // print_r($showitem);
                        echo $showitem[$n][4];
                      echo "<br>";
                   }
            
                
                 }
                 else 
                 {echo "你还未申请";} 

?>
		  
		  </div>
		</div>
	</div>
	<div></div>
</body>

</html>
