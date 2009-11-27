<?php 
include_once ("../../include/session.class.php");
require_once('noticlist.class.php');
require_once('../../include/function.include.php');
if($_SESSION['admin_super'] != 1){
						echo "<script language=javascript>\n";
					echo "location.assign('".APP_ROOT."/admin/login.php')\n";
					echo "</script>\n";
					exit;
}

$noticlist = new NoticListAction();
$noticlist->run();
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
      <h3><div class="left">通知列表</div>
	  	  <div class="right"><a href='javascript:history.back();'>返 回</a></div>
	  </h3>
	  <div class="clear">&nbsp;</div>
	
	  <div class="alltitle">
	        <div style="float:left; width:376px">通知标题</div>
			<div style="float:left; width:60px">发布人</div>
			 <div style="float:left; width:150px">发布时间</div>
	  </div>
		  
	  <div id="allcontent">	
	  <form action='itemlist.php?ac=onclick' name='itemform' method="POST" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?php 
          $data = $noticlist->getListData();
          foreach ($data as $v){
          ?>
          <tr align="left">
        	<td width='380px'><?php echo $v['notic_title']?></td>
            <td width="60px"><?php echo $v['user_name']?></td>
            <td ><?php echo date('y-m-d h:i:s',strtotime($v['notic_time']))?></td>
            <td ><a href="noticadd.php?id=<?php echo $v['notic_id']?>">编辑</a></td>
            <td ><a href="noticlist.php?ac=delet&id=<?php echo $v['notic_id']?>">删除</a></td>
          </tr>
        <?php }?>	 
		          </table>
		    <input type="hidden" name="action" id="action" value=""   />
		<div>
		<?php $noticlist->makepage();?>								 
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




