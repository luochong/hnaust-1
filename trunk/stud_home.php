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
//echo $studno;
$show=new stud();
$pageno=$_GET['page_no'];
//$studid=2007;
$showinfo=$show->showstud($studno);
$showitem=$show->showitem($studno,$pageno);
for($i=0;$i<count($showitem);$i++)
{
  // print_r($showitem);
        $itemcode[]=$showitem[$i]['app_item_code'];
    
}
//print_r($itemcode);
$itemdetail=$show->finditem($itemcode,$pageno);
//print_r($itemdetail);
$_SESSION['stud_no']=$showinfo[0]['stud_no'];
$_SESSION['stud_name']=$showinfo[0]['stud_name'];
$_SESSION['stud_sex']=$showinfo[0]['stud_sex'];
$_SESSION['stud_college']=$showinfo[0]['stud_college'];
$title = "项目列表";
require_once('control/tongji.include.php');
$tongji = new Tongji();
require_once('header.php');
?>
 <div id="leftinfo" class="fltlft" style="padding:20px 20px 20px 20px;width:150px;border-right:1px #ccc solid;height:100%">
 <h3>我的信息</h3>
<?php
             if(count($showinfo)!==0)
             {
              
                ?><p>学号：<?php  echo $showinfo[0]['stud_no'];?></p>
                  <p>姓名：<?php  echo $showinfo[0]['stud_name'];?></p>
                 <p>性别：<?php  echo $showinfo[0]['stud_sex'];?></p>
                  <p>学院：<?php  echo $showinfo[0]['stud_college'];?></p>
                  <p>入学年份：<?php  echo $showinfo[0]['stud_grade'];?></p>
                 <p>班级：<?php  echo $showinfo[0]['stud_class'];?></p>
                <p>申报截止日期：<?php  echo $showinfo[0]['stud_deadline'];?></p>
                     
          <?php    
             } 
 ?>
 <p style="color:#FF0000">如果您的信息不正确请联系湖南农业大学校团委修改</p>
 
 <!-- end #leftinfo --></div>
 
<div id="rightinfo" class="fltlft" style="padding:20px 20px 20px 20px;" >
<input type="button" value="点击申报" onclick=" location.href='stud_addapp.php'"/><br />
<?php
          if(count($showitem)!==0)
                 {
            ?>
<table class="itable" width="600">
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
 
                   for($n=0;$n<count($showitem);$n++)
                    {//print_r($itemdetail);
           ?> 
               <table class="showtb2">
                     <tr>
                     	<td class="showtd1" width="8%"><?php echo   $itemdetail[$n][0]['item_type'];?></td>
                         <td class="showtd1" width="15%"><?php echo   $itemdetail[$n][0]['item_code'];?></td>
                         <td class="showtd1" width="30%"><?php echo   $itemdetail[$n][0]['item_name'];?></td>
                         <td class="showtd1" width="13%"><?php echo   $itemdetail[$n][0]['item_rank'];?></td>
                         <td class="showtd1" width="8%"><?php echo   $itemdetail[$n][0]['item_score'];?></td>
                         <td class="showtd1" width="17%"><?php echo   getItemState($showitem[$n]['app_state']);?></td>
                         <td class="showtd_x"><a onclick="return confirm('确认是否删除？')" href="stud_homedel.class.php?code=<?php echo   $itemdetail[$n][0]['item_code'];?>">×</a></td>
                     </tr>
                   </table>
                   <p>       
                    <?php           
         
                   }
                    $show->page_list($studno);
                 }
                 else 
                 {echo "<h5>你还未申请!</h5>";} 
					?>
					</p>
  <!-- end #sidebar2 --></div>
  
  
  
  

<?php 
require_once("footer.php")
?>