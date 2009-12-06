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

$pageno=$_GET['page_no'];
$newsshow=$news->getnewscont($newsid);
$newstitle=$news->getnewsinfo($pageno);
$nshowup=$news->getnewscont($newsid+1);
$nshowdown=$news->getnewscont($newsid-1);
$title = "新闻中心";
require_once("header.php");
?>
		<div id="right" style="width:648px;border:#C1C1C1 solid 1px;background-color:#FFF0F0;float:left">
		  	<div id="item" style="border:#c1c1c1 solid 1px;margin-bottom:20px;text-align:center">
					<h2 style="color:red"><?php echo $newsshow[0]['news_title'];?></h2>
					
					<p><?php echo   "作者：".$newsshow[0]['news_author']; ?>&nbsp;&nbsp; &nbsp; 时间：<?php echo   $newsshow[0]['news_time']; ?></p>
		  	</div>
		  <div id="content" style="width:500px;margin:auto;line-height:1.5em">
		  	<?php  echo   $newsshow[0]['news_body']; ?>
		  		
		  </div><!--content fin-->
       </div>
       
  
           <div id="sidebar2" style="float:right" >

			<div style="background:url(images/st_20.jpg) no-repeat top left;height:45px">
                <div style="text-align:center;width:85%;padding-top:20px;margin-left:12px;color:#000;border-bottom:1px solid #000;height:22px"> 
                最新新闻
                </div>
            </div>            
            <div style="background:url(images/st_23.jpg) repeat-y top left;height:180px" class="notice">
            	<ul>
                	  <?php  
                	  //print_r($newstitle);
		         for($i=0;$i<count($newstitle)&&$i<9;$i++ ){?>
                    <li><a href="newscontent.php?newsid=<?php echo   $newstitle[$i]['news_id']; ?>"><span><?php echo $newstitle[$i]['news_title']?></span></a></li>
                 <?php }?>
            		
            	<ul>
            </div>  
            
            
            
            <div style="background:url(images/st_25.jpg) no-repeat top left;height:45px"></div> 
  <!-- end #sidebar2 --></div>
 <?php require_once("footer.php");?>
</body>

</html>
            





         
