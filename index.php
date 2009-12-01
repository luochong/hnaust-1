<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		索引首页
///
///	[Description]
///		索引首页页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理

require_once("index.class.php");
require("news.class.php");
$news=new news();

$newsshow=$news->indextitle();

$action = new LoginAction();
$action->run();
require_once("hearder.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>素质拓展学分认证系统>>首页</title>

<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
</head>
<style>

a{text-decoration:none}
a:link{color:blue;}   
a:visited{color:black;} 
a:hover{color:red;}    
#bcimg{
background:url(images/首页_13.gif) no-repeat top left;
*background:url(images/首页_13.gif) no-repeat 0px 2px; /* for IE6 */ 
}
</style>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div style="width:850px; margin:0 auto">
<table id="Table_01" width="852" height="584" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td rowspan="13">
			<img src="images/首页_01.gif" width="1" height="583" alt=""></td>
		<td colspan="5" rowspan="2">
			<img src="images/首页_02.gif" width="224" height="128" alt=""></td>
		<td colspan="12">
			<img src="images/首页_03.gif" width="626" height="92" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="92" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/首页_04.gif" width="9" height="36" alt=""></td>
		<td colspan="10" background="images/首页_06.gif">
			<div id="header">
					<ul>
				<li><a class="tit" href="stud_home.php" style="text-decoration:none">首&nbsp;页</a></li>
				<li><a class="tit" href="stud_addapp.php" style="text-decoration:none">项目申报</a></li>
				<li><a class="tit" href="#" style="text-decoration:none">资料下载</a></li>
				<li><a class="tit" href="stud_pwdchg.php" style="text-decoration:none">修改密码</a></li>
				<li><a class="tit" href="index.php?ac=logout" style="text-decoration:none">退出系统</a></li>
				<li><a class="tit" href="http://220.169.45.179/xnqn/web/" style="text-decoration:none">湘农青年</a></li>
			</ul>
			</div>		</td>
		<td>
			<img src="images/首页_08.gif" width="7" height="36" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="17" background="images/首页_09.gif">
		<form method="POST" action="index.php?ac=login" method="POST">用户名
			<input type="text" size="16" name="user_name" id="user_name"  />&nbsp;&nbsp;密码
		      <input name="user_password" size="16" type="password"/>&nbsp;&nbsp;&nbsp;<input type="submit" value="登录" /></form>
		<td>
			<img src="images/spacer.gif" width="1" height="34" alt=""></td>
	</tr>
	<tr>
		<td colspan="17">
			<img src="images/首页_10.gif" width="850" height="30" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="30" alt=""></td>
	</tr>
	<tr>
		<td colspan="9">
			<img src="images/首页_11.gif" width="275" height="19" alt=""></td>
		<td rowspan="6">
			<img src="images/首页_12.gif" width="26" height="269" alt=""></td>
		<td colspan="3" rowspan="3" id="bcimg" align="center" ></td>
		<td rowspan="6">
			<img src="images/首页_14.gif" width="36" height="269" alt=""></td>
		<td colspan="3" rowspan="2" background="images/首页_15.gif" align="center">通知</td>
		<td>
			<img src="images/spacer.gif" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="4">
			<img src="images/首页_16.gif" width="18" height="198" alt=""></td>
		<td colspan="6" rowspan="3">
			<img src="images/首页_17.gif" width="240" height="180" alt="">
			</td>
		<td rowspan="4">
		<img src="images/首页_18.gif" width="17" height="198" alt="">
			</td>
		<td>
			<img src="images/spacer.gif" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td class="alinkword" colspan="3" rowspan="4" background="images/首页_19.gif" align="center"><MARQUEE  onmouseover=this.stop(); onmouseout=this.start(); direction=up height=140 width=150 		scrollAmount=1 scrollDelay=1>
			<a class='zhiti1' href='#' title='关于认真做好2009年湖南省“三下乡”社会实践活动总结表彰工作的通知'>1.关于认真做好2009年湖南省大中专学生志愿者暑期文化科技卫生“三下乡”社会实践活动总结表彰工作的通知
</a><br>
	    <br><a class='zhiti1' href='#' title='关于的通知'>2.关于开展第八届“求真”大学生学术科技节的通知
</a><br>
	      <br><a class='zhiti1' href='#' title='关于的通知'>3.第十五届湖南省大学生英语演讲比赛</a><br><br>
	    
		<td>
			<img src="images/spacer.gif" width="1" height="17" alt=""></td>
	</tr>
		
	<tr>
	  <td  colspan="3" rowspan="3"><table width='100%' height="175" cellpadding='0' cellspacing='0'>

            <?php  
		  for($i=0;$i<count($newsshow)&&$i<9;$i++ ){?>
            <tr>
             
                <td  valign='top' class=''></td>
			    <td class=''><a href="newscontent.php?newsid=<?php echo   $newsshow[$i]['news_id']; ?>"><font size="2">
			    <?php echo substr($newsshow[$i]['news_title'],0,50) ;
			         if(strlen($newsshow[$i]['news_title'])>50){
			             echo "...";
			         }
			    ;?></a></font></td>
			    <td align='right' class="cutstring"><font size="2"><?php echo date("m-d",strtotime($newsshow[$i]['news_time']))?></font></td></td>
	      
			  </tr>
	      	<?php } ?>
	  
		  </table><br><a href="newstitle.php" class="zhiti3">more>></a></td>
		<td>
		  
			<img src="images/spacer.gif" width="1" height="144" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" background="images/首页_22.gif">
		<img src="images/首页_22.gif" width="5" height="18" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td colspan="9">
			<img src="images/首页_23.gif" width="275" height="52" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="52" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/首页_24.gif" width="9" height="43" alt=""></td>
	  <td colspan="14" background="images/首页_26.gif" style="font-size:14px; font-weight:10px; text-align:center; padding-top:13px;" ><A class="tail" href="http://www.ccyl.org.cn/" target=_blank>中国共青团</A> | <A class="tail" href="http://www.cyol.net/" target=_blank>中青在线</A> | <A class="tail" href="http://www.hngqt.com/" target=_blank>湖南青年</A> | <A class="tail" href="http://www.hunau.net/" target=_blank>湖南农大</A> | <A class="tail" href="http://www.hunau.net/xgzx">学工部</A> | <A class="tail" href="http://61.187.55.45/dejwc" target=_blank>教务处</A> | <A class="tail" href="http://www.hunau.net/zhaoshengweb" target=_blank>招生就业</A> | <A class="tail" href="http://www.youthedu.com.cn/" target=_blank>中青网络教育中心</A></td>
		<td colspan="2">
			<img src="images/首页_28.gif" width="11" height="43" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="43" alt=""></td>
	</tr>
	<tr>
		<td colspan="17">
			<img src="images/首页_29.gif" width="850" height="12" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="12" alt=""></td>
	</tr>
	<tr>
		<td style="background:url(images/首页_30.gif) no-repeat 0px -1px; ">
			</td>
		<td colspan="14" background="images/首页_32.gif" align="center"><div id="tailer">| <A class="tail1" href="/xnqn/web/aboutus/aboutus.asp" target=_blank>关于我们</A> |<A class="tail1" href="/xnqn/web/FriendSite/Index.asp" target=_blank> 友情链接</A> | <A class="tail1" href="/xnqn/web/Copyright.asp" target=_blank>版权申明</A> | 访客留言|<BR>
		    Copyright2001-2009共青团湖南农业大学委员会 <BR>
		    湘ICP备05002035号</div></td>
		<td colspan="2" style="background:url(images/首页_34.gif) no-repeat 0px -1px; ">
			</td>
		<td>
			<img src="images/spacer.gif" width="1" height="67" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="174" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="20" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="17" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="26" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="11" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="305" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="36" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="185" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="7" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</div>
</body>
</html>