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
$noticdata = $news->getNotice();
$action = new LoginAction();
$action->run();
$title = '首页';

require_once("header.php");
?>
 <div id="sidebar1" >
  <img src="images/shouyedoghua.gif" width="244" height="182" /> 
  <!-- end #sidebar1 --></div>
  <div id="mainContent">
		<div class="huibg" style="height:31px"> </div>
		<div class="newscontent">
        	<img  style="margin-bottom:10px"src="images/1.gif" width="319" height="47" />             
     
            <ul>
            <?php  
		         for($i=0;$i<count($newsshow)&&$i<9;$i++ ){?>
                   <li><a href="newscontent.php?newsid=<?php echo   $newsshow[$i]['news_id']; ?>"><span><?php echo $newsshow[$i]['news_title']?></span><span class="time">[<?php echo date("m-d",strtotime($newsshow[$i]['news_time']))?>]</span></a></li>
	      	<?php } ?>
          </ul>      
    </div>
  <!-- end #mainContent --></div>
    <div id="sidebar2" >
           <div class="huibg" style="height:31px"> </div>
			<div style="background:url(images/st_20.jpg) no-repeat top left;height:45px">
                <div style="text-align:center;width:85%;padding-top:20px;margin-left:12px;color:#000;border-bottom:1px solid #000;height:22px"> 
                通&nbsp;&nbsp;&nbsp;知&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="noticelist.php">More...</a>
               
                </div>
            </div>            
            <div style="background:url(images/st_23.jpg) repeat-y top left;height:180px" class="notice">
            	<ul>
                	<marquee  scrolldelay="1" scrollamount="1" direction="up" onmouseout="this.start();" onmouseover="this.stop();">
                    <?php foreach ($noticdata as $v): ?>
                    <li><a href="<?php echo APP_ROOT?>/notice.php?id=<?php echo $v['notic_id']?>"><span><?php echo $v['notic_title']?></span></a></li>
                    <?php  endforeach;?>
            		</marquee>
            	</ul>
            </div>  
            <div style="background:url(images/st_25.jpg) no-repeat top left;height:45px"></div> 
  <!-- end #sidebar2 --></div>
  <?php
  require_once("footer.php");
  ?>