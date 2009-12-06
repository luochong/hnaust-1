<?php 
include_once ("../../include/session.class.php");
require_once('newslist.class.php');
require_once('../../include/function.include.php');
$newslist = new NewsListAction();
$newslist->run();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../css/stat.css" type=text/css rel=stylesheet />
<script language="javascript" type="text/javascript">
function $(id){
	return document.getElementById(id);
}
</script>

</head>
<body >
 <div class="allRoundedCorner">
     <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
    </b>
     <div id="allbox">
      <h3><div class="left">新闻列表</div>
	  	 <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	
	  <div class="alltitle">
	        <div style="float:left; width:376px">新闻标题</div>
		    <div style="float:left; width:60px">作者</div>
			<div style="float:left; width:60px">状态</div>
			<div style="float:left; width:60px">发布人</div>
			 <div style="float:left; width:150px">发布时间</div>
	  </div>
		  
	  <div id="allcontent">	
	  <form action='itemlist.php?ac=onclick' name='itemform' method="POST" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?php 
          $data = $newslist->getListData();
          foreach ($data as $v){
          ?>
          <tr align="left">
        	<td width='380px'><?php echo $v['news_title']?></td>
            <td width='60px'><?php echo $v['news_author']?></td>
            <td width="60px"><?php echo getNewsState($v['news_state'])?></td>
            <td width="60px"><?php echo $v['user_name']?></td>
            <td ><?php echo date('m-d',strtotime($v['news_time']))?></td>
            <td ><a href="newsadd.php?id=<?php echo $v['news_id']?>">编辑</a></td>
            <td ><?php if($_SESSION['admin_super']){?> <a href="newslist.php?ac=passnews&id=<?php echo $v['news_id']?>"><?php if($v['news_state'] == 1) echo '取消';else  echo '发布'?></a><?php } ?></td>
          	 <td ><a href="newslist.php?ac=del&id=<?php echo $v['news_id']?>" onclick="return confirm('你确定删除吗？')">删除</a></td>
            
           </tr>
        <?php }?>	 
		          </table>
		    <input type="hidden" name="action" id="action" value=""   />
		<div>
		<?php $newslist->makepage();?>								 
		</form>
		
		</div>
     
		</div>
	 
	 </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
  </div>



</body>
</html>




