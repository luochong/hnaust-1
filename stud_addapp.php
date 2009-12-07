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


 $itype=$_POST['i_type'];
 $iname=$_POST['i_name'];
 $irank=$_POST['i_rank'];
 


 $studno=$showinfo[0]['stud_no'];
$studcode=$showinfo[0]['stud_orgcode'];

if( isset($_POST['submit']) )
{
  
  $acode=$citem->setitem($itype,$iname,$irank);
 $code=$acode[0]['item_code'];

 if($acode!==null){
    $citem->insertapp($itype,$code,$studno,$studcode);
 }
}
$title = "申报项目";
require_once("header.php");

?>
<script type="text/javascript">
/*window.onload = function() {
 if (document.getElementsByTagName) {
  var s = document.getElementsByTagName("select");

  if (s.length > 0) {
   window.select_current = new Array();

   for(var i=0, select; select = s[i]; i++){
    select.onfocus = function(){ window.select_current[this.id] = this.selectedIndex; }
    select.onchange = function(){ restore(this); }
    emulate(select);
   }
  }
 }
}

function restore(e){
 	if (e.options[e.selectedIndex].disabled == "disabled"){
  		e.selectedIndex = window.select_current[e.id];
 	}
}

function emulate(e){
	for(var i=0, option; option = e.options[i]; i++){
		if(option.disabled){
			option.style.color = "graytext";
		}else{
	   		option.style.color = "menutext";
		}
	}
}
*/

</script>

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

 <form method="POST" name="form" onsubmit="return confirm('确认提交？')" >
			  <div id="choose">
			  <?php 
            
			  if(getPermittime()>$showinfo[0]['stud_grade']*100&&getPermittime()<$showinfo[0]['stud_deadline']*100+3)
			  {?>
			  
			  
					<div id="itemleibie"><span class="leibie">请选择你要申报项目的类别：</span>

                   <select name='i_type' id='i_type' onchange="$('#i_rank').html('<option value=\'0\'>...</option>');$('#i_name').load('./stud_addapp.php?ac=getIname&i_type='+encodeURIComponent(this.value));">
			 	  <option value="0">...</option>
			 	  <!--<optgroup label="求实" style="font-family:宋体">-->
				  <option value="求真" >求真学术科技活动</option>
		          <option value="求善" >求善文明道德活动</option>
		          <option value="求美" >求美文化艺术活动</option>
			<?php 	if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0") || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0")) {?>
		    <?php }else{?>
		    	  <option value="" disabled="disabled">求实社会实践活动</option>
		          <option value="" disabled="disabled">求特个性发展活动</option>
		          <?php }?>
		          <option value="求强" >求强就业创业活动</option>
			 </select><font color="Red">&nbsp;*必选</font><br />
                    <br />	
                    <?php if($_POST['itype']=="求实"||$_POST['itype']=="求特")
                            {
                                echo "求实和求特类别由学院直接提交，不允许学生申请";
                            }
                      ?>				
					</div>
					
					<div id="itemxianmu"><span class="leibie">请选择你要申报项目的名称：</span>
					   <select name='i_name' id='i_name' onchange="$('#i_rank').load('./stud_addapp.php?ac=getIrank&i_name='+encodeURIComponent(this.value));">
		     	 <option value="0">...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		     </select><font color="Red">&nbsp;*必选</font><br />
		     <br />	
					</div>
					
					<div id="itemdengji"><span class="leibie">请选择你要申报项目的级别：</span>
					  <select name='i_rank' id='i_rank'>
          	 	 <option value="0">...&nbsp;&nbsp;</option>
          	 </select><font color="Red">&nbsp;*必选</font><br />
			<br />
					
					</div>
					
					<br />
					<br />
				
					<input name="submit" type="submit" value=" 提 交 " >     
					
					
					
			  </div>
			 </form>
		   <?php }
		   else{
		   		echo "</div>"	;
		       echo "<h2 style=\"color:red;text-align:center\">申报截止日期已到！</h2>";;
		       echo "<h2 style=\"color:red\">申报时间从大一至大四上学年</h2>";
		   } ?>








<!-- end #sidebar2 --></div>
  








<?php 
require_once('footer.php');
?>