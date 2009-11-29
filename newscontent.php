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
require_once("news.class.php");	
$news=new news();
$newsid=$_GET['newsid'];


$newsshow=$news->getnewscont($newsid);
$nshowup=$news->getnewscont($newsid+1);
$nshowdown=$news->getnewscont($newsid-1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php   echo   $newsshow[0]['news_title']; ?></title>
<style>a{text-decoration:none}</style>
<link href="include/thickbox.css" rel="stylesheet" type="text/css"/>
</head>


<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
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
			</ul>
			</div>		</td>
		<td>
			<img src="images/首页_08.gif" width="7" height="36" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="17" background="images/首页_09.gif">&nbsp;
		
			</td>
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
		<td colspan="3" rowspan="3" align="center" background="images/首页_13.gif">公告</td>
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
			</td>
		<td rowspan="4">
			<img src="images/首页_18.gif" width="17" height="198" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="4" background="images/首页_19.gif" align="center"><MARQUEE onmouseover=this.stop(); onmouseout=this.start(); direction=up height=140 width=150 		scrollAmount=1 scrollDelay=1>
			<a class='zhiti1' href='#' title='关于认真做好2009年湖南省“三下乡”社会实践活动总结表彰工作的通知'>1.关于认真做好2009年湖南省大中专学生志愿者暑期文化科技卫生“三下乡”社会实践活动总结表彰工作的通知
</a><br>
	    <br><a class='zhiti1' href='#' title='关于的通知'>2.关于开展第八届“求真”大学生学术科技节的通知
</a><br>
	      <br><a class='zhiti1' href='#' title='关于的通知'>3.第十五届湖南省大学生英语演讲比赛</a><br><br>
	    
		<td>
			<img src="images/spacer.gif" width="1" height="17" alt=""></td>
	</tr>
	<tr>
	  <td colspan="3" rowspan="3"><table width='100%' height="133" cellpadding='0' cellspacing='0'>
		
              <font size="3"><?php  echo   $newsshow[0]['news_title']; ?></font><br />
              <font size="2"><?php echo   $newsshow[0]['news_time']; ?></font>
              <font size="2"><?php echo   $newsshow[0]['news_author']; ?></font><br />
              <font size="2"><?php  echo   $newsshow[0]['news_body']; ?></font>





 <br /><font size="2">上一篇：<a href="newscontent.php?newsid=<?php echo $nshowup[0]['news_id']  ?>"><?php echo $nshowup[0]['news_title']  ?> </a><br />
下一篇：<a href="newscontent.php?newsid=<?php echo $nshowdown[0]['news_id']  ?>"><?php echo $nshowdown[0]['news_title']  ?></a></font>

		  </table></td>
		<td>
			<img src="images/spacer.gif" width="1" height="144" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="images/首页_21.gif" width="235" height="18" alt=""></td>
		<td>
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
		<td>
			<img src="images/首页_30.gif" width="9" height="67" alt=""></td>
		<td colspan="14" background="images/首页_32.gif" align="center"><div id="tailer">| <A class="tail1" href="/xnqn/web/aboutus/aboutus.asp" target=_blank>关于我们</A> |<A class="tail1" href="/xnqn/web/FriendSite/Index.asp" target=_blank> 友情链接</A> | <A class="tail1" href="/xnqn/web/Copyright.asp" target=_blank>版权申明</A> | 访客留言|<BR>
		    Copyright2001-2009共青团湖南农业大学委员会 <BR>
		    湘ICP备05002035号</div></td>
		<td colspan="2">
			<img src="images/首页_34.gif" width="11" height="67" alt=""></td>
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
</body>
</html>

         
