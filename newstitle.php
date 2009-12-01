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
$pageno=$_GET['page_no'];
$newsshow=$news->getnewsinfo($pageno);

$title = "新闻列表";
require_once("header.php");
?>


		<div id="right" style="width:648px;height:300px;border:#C1C1C1 solid 1px;background-color:#FFF0F0;float:left">
		  	<div id="item" style="border:#c1c1c1 solid 1px;height:40px;margin-bottom:20px;text-align:center">
					<span style="float:left;width:630px"><h2>新闻列表</h2></span>
		  	</div>
		  <div id="content" style="width:560px;margin:auto;">
				<ul>
					<?php for($i=0;$i<count($newsshow);$i++ ){  ?>
					<li><span style="width:400px;display:inline-block;"><a href="newscontent.php?newsid=<?php echo   $newsshow[$i]['news_id']; ?>"><?php echo   $newsshow[$i]['news_title']; ?></a></span><span><?php echo $newsshow[$i]['news_time'];?></span></li>
					<?php }?>
				
				</ul>
	
		  		
		  		
		  </div><!--content fin-->
       </div>
       
  
       
       
       
       
       
       
       
       
       
           <div id="sidebar2" style="float:right" >

			<div style="background:url(images/st_20.jpg) no-repeat top left;height:45px">
                <div style="text-align:center;width:85%;padding-top:20px;margin-left:12px;color:#000;border-bottom:1px solid #000;height:22px"> 
                通知
                </div>
            </div>            
            <div style="background:url(images/st_23.jpg) repeat-y top left;height:180px" class="notice">
            	<ul>
                	<marquee  scrolldelay="1" scrollamount="1" direction="up" onmouseout="this.start();" onmouseover="this.stop();">
                    <li><a href=""><span>最新新闻最新新闻最新新闻最新新闻最新新闻最新新闻</span></a></li>
                    <li><a href=""><span>最新新闻最新新闻最新新闻最新新闻最新新闻最新新闻</span></a></li>
            		</marquee>
            	<ul>
            </div>  
            
            
            
            <div style="background:url(images/st_25.jpg) no-repeat top left;height:45px"></div> 
  <!-- end #sidebar2 --></div>
 <?php require_once("footer.php");?>
</body>

</html>
            








<!--		<div id="right">
		  <div id="item">
		  		<div id="location">
					<div id="location_tit">新闻列表</div>
					<div id="showtime"><?php echo getNowTate()?></div>
				</div>

		<?php
for($i=0;$i<count($newsshow);$i++ )
{
   ?>
   <a href="newscontent.php?newsid=<?php echo   $newsshow[$i]['news_id']; ?>">><font size="2"><?php echo   $newsshow[$i]['news_title']; ?></a>

<?php echo   $newsshow[$i]['news_time']; 
       echo "<br />";}?></font>
<?php
          $news->page_list();
?>
       </div>
		</div>
	</div>
</body>

</html>-->