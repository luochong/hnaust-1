<?php 
//include_once ("../include/session.class.php");
//include_once ("include/config.php");
//include_once ("include/function.php");
/*$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
mysql_select_db("$dbname"); 
mysql_query("SET NAMES 'utf8'",$hwnd);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="css/scrlContainer.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/stat.css" media="screen" />

<script type="text/javascript">

function changeTab( id ) {
	var thisID = id;
	var blockID = id + "_block";
	
	document.getElementById('menu01').className = "";
	document.getElementById('menu02').className = "";
	document.getElementById('menu03').className = "";
	document.getElementById('menu04').className = "";
	document.getElementById('menu05').className = "";


	
	document.getElementById('menu01_block').style.display = "none";
	document.getElementById('menu02_block').style.display = "none";
	document.getElementById('menu03_block').style.display = "none";
	document.getElementById('menu04_block').style.display = "none";
	document.getElementById('menu05_block').style.display = "none";

	
	document.getElementById(thisID).className = "selected";
	document.getElementById(blockID).style.display = "block";
	
}


</script>
<script type="text/javascript">
function showre( id ) {

	if(document.getElementById(id).style.display=="block"){
		document.getElementById(id).style.display = "none";
	}
	else{
		document.getElementById(id).style.display = "block";
	}
}
</script>
</head>
<body>
<div class="clear"></div>

<div id="scrlContainer">系统公告：
   <div id="scrlContent">
	  <a href="http://10.8.9.9/doc/admin.rar">[管理员使用手册]湖南农业大学学生素质拓展学分认证平台 <b>提供下载</b></a>
   </div>
</div>

<div id="me">
<div id="content">
     <div class="statblock">
        <div class="statbg"> 
         <h3>统计数据汇总:</h3>
	       <ul id="stattab">
	        <li id="menu01" class=""><a href="javascript:changeTab('menu01');"><span>已上报</span></a></li>
	        <li class="selected" id="menu02"><a href="javascript:changeTab('menu02');"><span>数字汇总</span></a></li>
	        <li class="" id="menu03"><a href="javascript:changeTab('menu03');"><span>月份柱形图</span></a></li>
            <li class="" id="menu04"><a href="javascript:changeTab('menu04');"><span>数字比例 扇形图</span></a></li>
            <li class="" id="menu05"><a href="javascript:changeTab('menu05');"><span>其它（二）</span></a></li>
     	  </ul>

		   <div style="display: none;" class="linkblock" id="menu01_block">
			<a href=""><span>二级菜单1</span></a>
			<a href=""><span>菜单</span></a>
			<a href=""><span>菜单</span></a>
			<a href=""><span>菜单</span></a>
			<a href=""><span>菜单</span></a>
			<a href=""><span>菜单</span></a>
			<a href=""><span>菜单</span></a>
		   </div>

		   <div class="linkblock" id="menu02_block" style="display: block;">
			<a href="">二级菜单2</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
		        <div class="data">
		        <h2>湖南农业大学统计数字汇总:</h2>
		           <div>
		              <div class="line">
		              <h3>湖南农业大学共有教职员工3200人。目前列入系统进行数据采样共2000人。</h3>
		              </div>

		              <div class="line">
		              <h3>湖南农业大学共有专职教师1200人。目前列入系统进行数据采样共1000人。</h3>
		              </div>

		              <div class="line">
		              <h3>湖南农业大学共有行政后勤人员2000人。目前列入系统进行数据采样共1300人。</h3>
		              </div>

		              <div class="line">
		              <h3>湖南农业大学共有18个学院。目前列入系统进行数据采样共15个学院。</h3>
		              </div>
		            </div>
                  </div>

		   </div>

		   <div class="linkblock" id="menu03_block" style="display: none;">
			<a href="">二级菜单3</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>

			<table class="bargraph">
			    <tr>
			        <td>10000<img src="images/column.gif" width="36" height="10" alt="10000" /></td>
			        <td>15000<img src="images/column1.gif" width="36" height="30" alt="15000" /></td>
			        <td>20000<img src="images/column.gif" width="36" height="40" alt="20000" /></td>
			        <td>30000<img src="images/column1.gif" width="36" height="60" alt="30000" /></td>
			        <td>35000<img src="images/column.gif" width="36" height="70" alt="35000" /></td>
			        <td>40000<img src="images/column1.gif" width="36" height="80" alt="40000" /></td>
			        <td>50000<img src="images/column.gif" width="36" height="100" alt="50000" /></td>
			        <td>60000<img src="images/column1.gif" width="36" height="120" alt="60000" /></td>
			        <td>70000<img src="images/column.gif" width="36" height="140" alt="70000" /></td>
			        <td>80000<img src="images/column1.gif" width="36" height="160" alt="80000" /></td>
			        <td>90000<img src="images/column.gif" width="36" height="180" alt="90000" /></td>
			        <td>100000<img src="images/column1.gif" width="36" height="200" alt="100000" /></td>
			    </tr>
			    <tr>
			       <td>Jan</td>
			       <td>Feb</td>
			       <td>Mar</td>
			       <td>Apr</td>
			       <td>May</td>
			       <td>Jun</td>
 			       <td>Jul</td>
 			       <td>Aug</td>
 			       <td>Sep</td>
 			       <td>Oct</td>
 			       <td>Nov</td>
 			       <td>Dec</td>
			    </tr>
			</table>
		    </div>

		   <div class="linkblock" id="menu04_block" style="display: none;">
			<a href="">二级菜单4</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>

			<table>
			    <tr>
			        <td class="width">女性比例</td>
			        <td class="pie size45"></td>
			        <td class="percent">45%</td>
			    </tr>
			    <tr>
			        <td class="width">共产党员</td>
			        <td class="pie size20"></td>
			        <td class="percent">20%</td>
			    </tr>
			    <tr>
			        <td class="width">教授</td>
			        <td class="pie size15"></td>
			        <td class="percent">15%</td>
			    </tr>
			    <tr>
			        <td class="width">博士生导师</td>
			        <td class="pie size5"></td>
			        <td class="percent">5%</td>
			    </tr>
			    <tr>
			        <td class="width">获得硕士以上学位的教师占</td>
			        <td class="pie size75"></td>
			        <td class="percent">75%</td>
			    </tr>
			</table>
		    </div>
				
		    <div class="linkblock" id="menu05_block" style="display: none;">
			<a href="">二级菜单5</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
			<a href="">菜单</a>
		    </div>
	     </div>
        </div>
			
    <div class="footer">
	  <h2>统计数据汇总时间:2009年11月18日</h2>
   </div>

</div>

	
	
  <div class="rightRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="leftmenu">
      <h3>本学年项目审批情况汇总:</h3>
	  <div class="handtitle">审批结果</div>
	  <div id="rightcontent">
	      <div>总送审项目数：1234个</div>
		  <div>总批准项目数：1123个</div>
		  <div>送审项目总学分：2546分</div>
		  <div>送审项目总有效学分：2014分</div>
	  </div><br />
     </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>
  
 </div>

<div style="clear: both;">&nbsp;</div> 
 
<div class="main_align">
&copy;2009&nbsp;<a href="#"></a>&nbsp; 版权所有</div>
<div class="clear"></div>
</body>
</html>