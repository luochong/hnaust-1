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
 <div id="leftinfo" class="fltlft" style="padding:20px 20px 20px 20px;width:150px;border-right:1px #ccc solid;height:400px">
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
 <p style="color:#FF0000">
 如果你的信息不正确<br />
 请及时联系管理员<br />
 联系电话：<?php echo TEL;?>
 </p>
 
 <!-- end #leftinfo --></div>
 
<div id="rightinfo" class="fltlft" style="padding:20px 20px 20px 20px;" >
<input type="button" value="点击申报" onclick=" location.href='stud_addapp.php'"/>
<br />
<table width=400">
			<tr>
				<td width="100">有效申报项目:</td>
					<td width="60">
					<?php $citem = $tongji->countItemByStudId($_SESSION['studno']);
					  echo $citem==''?0:$citem;
					?></td>
				<td width="100">总计申报学分:</td>
					<td width="60">
					<?php $citem = $tongji->countAllCreditByStudId($_SESSION['studno']);
					
					 echo $citem==''?0:$citem;
					?>
					
					</td>
				<td width="100">总计有效学分:</td>
					<td width="60"><?php $citem =  $tongji->countValidCreditByStudId($_SESSION['studno']);
					 echo $citem==''?0:$citem;
					?></td>
			</tr>
			<?php $data = $tongji->countLessonCredit($_SESSION['studno']);
					foreach ($data as $v){
						$score[$v['mark_lesson_type']] = $v['mark_lesson_score'];
						
					}
			?>
			<tr>
				<td width="100">求真课程学分:</td>
					<td width="60"><?php echo $score['求真']==''?0:$score['求真']?></td>
				<td width="100">求善课程学分:</td>
					<td width="60"><?php  echo $score['求善']==''?0:$score['求善']?></td>
				<td width="100">求美课程学分:</td>
					<td width="60"><?php  echo $score['求美']==''?0:$score['求美']?></td>
			</tr>
			<tr>
				<td width="100">求实课程学分:</td>
					<td width="60"><?php  echo $score['求实']==''?0:$score['求实']?></td>
				<td width="100">求特课程学分:</td>
					<td width="60"><?php  echo $score['求特']==''?0:$score['求特']?></td>
				<td width="100">求强课程学分:</td>
					<td width="60"><?php  echo $score['求强']==''?0:$score['求强']?></td>
			</tr>
</table>
<br />
<?php
          if(count($showitem)!==0)
                 {
            ?>
<table class="itable" width="600">
                     <tr >
                     <th align="center" width="8%">类别</th>
                     <th align="center" width="15%">编号</th>
                     <th align="center" width="30%">名称</th>
                     <th align="center" width="13%">级别</th>
                     <th align="center" width="8%">学分</th>
                     <th align="center" width="17%">审核状态</th>
                     <th align="center">操作</th>
                     </tr>
              
		  <?php
 
                   for($n=0;$n<count($showitem);$n++)
                    {//print_r($itemdetail);
           ?> 
             
                     <tr>
                     	<td align="center" width="8%"><?php echo   $itemdetail[$n][0]['item_type'];?></td>
                         <td align="center" width="15%"><?php echo   $itemdetail[$n][0]['item_code'];?></td>
                         <td align="center" width="30%"><?php echo   $itemdetail[$n][0]['item_name'];?></td>
                         <td align="center" width="13%"><?php echo   $itemdetail[$n][0]['item_rank'];?></td>
                         <td align="center" width="8%"><?php echo   $itemdetail[$n][0]['item_score'];?></td>
                         <td align="center" width="17%"><?php echo   getItemState($showitem[$n]['app_state']);?></td>
                         <td align="center"><a onclick="return confirm('确认是否删除？')" href="stud_homedel.class.php?code=<?php echo   $itemdetail[$n][0]['item_code'];?>">×</a></td>
                     </tr>
                 
       
                   
                        
                    <?php           
         
                   }?>
                   
                     </table> <p> 
                   <?php
                    $show->page_list($studno);
                    echo '</p>';
                 }
                 else 
                 {echo "<h5>你还未申请!</h5>";} 
					?>
				

					
					
					
  <!-- end #sidebar2 --></div>
  
  
  
  

<?php 
require_once("footer.php")
?>