<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请页面
///
///	[Description]
///		学生项目申请申请页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
// header('Content-Type:   text/html;   charset=utf-8');
require("include/sessionstud.php");

require("stud_home.class.php");
require("stud_addapp.class.php");

$studno=$_SESSION["studno"];
$citem=new selitem();
$citem->run();
$show=new stud();
$showinfo=$show->showstud($studno);


$finditem=$citem->finditem($itype,$iname);
 $itype=$_POST['i_type'];
 $irank=$_POST['i_rank'];
 $iname=$_POST['i_name'];
 $studno=$showinfo[0]['stud_no'];
$studcode=$showinfo[0]['stud_orgcode'];

if( isset($_POST['submit']) )
{
  
  $acode=$citem->setitem($itype,$iname,$irank);
 $code=$acode[0]['item_code'];
    $citem->insertapp($itype,$code,$studno,$studcode);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>项目申报</title>
<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
<link href="login.css" rel="stylesheet" type="text/css"/>

</head>
<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/thickbox.js"></script>
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
              
                ?>学号：<?php  echo $showinfo[0]['stud_no'];?>
                  <br>姓名：<?php  echo $showinfo[0]['stud_name'];?>
                  <br>性别：<?php  echo $showinfo[0]['stud_sex'];?>
                  <br>学院：<?php  echo $showinfo[0]['stud_college'];?>
                  <br>入学年份：<?php  echo $showinfo[0]['stud_grade'];?>
                  <br>班级：<?php  echo $showinfo[0]['stud_class'];?>
                  <br>申报截止日期：<?php  echo $showinfo[0]['stud_deadline'];?>
                     
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
					<div id="location_tit">所在的位置：项目申报</div>
					<div id="showtime"><?php echo getNowTate()?></div>
				</div>
 <form method="POST" name="form" onsubmit="return confirm('确认提交？')" >
			  <div id="choose">
			  <?php 
            
			  if(getPermittime()>$showinfo[0]['stud_grade']*100+100&&getPermittime()<$showinfo[0]['stud_deadline']*100+3)
			  {?>
			  
			  
					<div id="itemleibie"><span class="leibie">请选择你要申报项目的类别：</span>

                   <select name="i_type" onchange="$('#i_rank').html('<option value=\'0\'>...</option>');$('#i_name').load('./stud_addapp.php?ac=getIname&i_type='+encodeURIComponent(this.value));">
			 	  <option value="0">...</option>
				  <option value="求真" >求真</option>
		          <option value="求善" >求善</option>
		          <option value="求美" >求美</option>
		          <option value="求实" disabled>求实</option>
		          <option value="求特" disabled>求特</option>
		          <option value="求强" >求强</option>
			 </select><br />
                    <br />	
                    <?php if($_POST['itype']=="求实"||$_POST['itype']=="求特")
                            {
                                echo "求实和求特类别由学院直接提交，不允许学生申请";
                            }
                      ?>				
					</div>
					
					<div id="itemxianmu"><span class="leibie">请选择你要申报项目的名称：</span>
					   <select name='i_name' id='i_name' onchange="$('#i_rank').load('./stud_addapp.php?ac=getIrank&i_name='+encodeURIComponent(this.value));">
		     	 <option value="0">...</option>
		     </select><br />
					</div>
					
					<div id="itemdengji"><span class="leibie">请选择你要申报项目的级别：</span>
					  <select name="i_rank" id='i_rank'>
          	 	 <option value="0">...</option>
          	 </select><br />
			<br />
					
					</div>
					
					<div id="sub">
				
					<input name="submit" type="submit" value=" 提 交 " >     
					
					</div>
					
			  </div>
			 </form>
		   <?php }
		   else{
		       echo "还未达到申报时间";echo "<br />";
		       echo "申报时间从大二至大四上学年";
		   } ?>
		     
		  </div>
		</div>
	</div>
</body>

</html>
