<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生密码修改首页
///
///	[Description]
///		学生密码修改页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

require_once("stud_pwdchg.class.php");
require("include/sessionstud.php");
require("include/function.include.php");
require("stud_home.class.php");


$studno=$_SESSION["studno"];
$pwdchag=new pwdchg();
$show=new stud();
$showstudb=$pwdchag->showitem($studno);
$showinfo=$show->showstud($studno);
$title = '修改密码';
require_once("header.php");
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
 <p style="color:#FF0000">
 如果你的信息不正确<br />
 请及时联系管理员<br />
 联系电话：<?php echo TEL;?>
 </p>
 
 <!-- end #leftinfo --></div>
 
<div id="rightinfo" class="fltlft" style="padding:20px 20px 20px 20px;" >

 
			  <div id="choose">
			   <div id="home_display_com">
						<div id="passwordform">
							
			<form method="POST" name="form" style="padding-top:60px" class="zhiti">
                旧&nbsp;&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" name="oldpwd"><br />
                <br>新&nbsp;&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" name="newpwd"><br />
                <br>确&nbsp;认&nbsp;新&nbsp;密&nbsp;码&nbsp;&nbsp;<input type="password" name="confpwd"><br /><br>
                <p class="zhiti2">
              <?php 
          		
                if($_POST['oldpwd']!==null)
                {
					echo "<h3 style=\"color:red\">";
                	if($_POST['oldpwd']!==$showstudb[0]['stud_password'])
                    echo "原密码错误";
                   elseif($_POST['newpwd']==null)
                    echo "新密码不能为空";
                    
                   elseif($_POST['newpwd']!==null&&$_POST['confpwd']!==null&&$_POST['newpwd']!==$_POST['confpwd'])
                      echo "密码与确认密码不一致";
                elseif($_POST['oldpwd']!==null&&$_POST['newpwd']==$_POST['confpwd']&&$_POST['oldpwd']==$showstudb[0]['stud_password'])
                {
                    $pwdchag->pwdupdate($studno,$_POST['newpwd']);
                    echo "密码修改成功";
                }  
                
                echo "</h3>";
                 }
                ?>
                </p>
                <p><input style="margin-left:37%" type="submit"  value=" 确 认 "></p>
                
                    </form>
				</div>
			</div>
			</div>
			</div>		


<!-- end #sidebar2 -->
  


<?php 
require_once('footer.php');
?>
 

		