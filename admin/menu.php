

<script type="text/javascript">
function $(_sId){
	return document.getElementById(_sId); //getElementById() 返回对拥有指定 id 的第一个对象的引用。   龙 2009/07/09
}
function hide(_sId){  //隐藏菜单
	$(_sId).style.display = $(_sId).style.display == "none" ? "" : "none";
}
</script>
<link rel="stylesheet" href="css/stat.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="leftRoundedCorner">
    <b class="rtop">
     <b class="r1"></b>
	 <b class="r2"></b>
	 <b class="r3"></b>
	 <b class="r4"></b>
   </b>
   <div id="leftmenu">
      <div class="hand" onclick="hide('hideMenuFunc10')">项目审批</div>
	  <div id="hideMenuFunc10">
	      <div><a href="#" target="main">项目审批</a> | <a href="#" target="main">管理</a></div>
		  <div><a href="#" target="main">项目审批</a> | <a href="#" target="main">管理</a></div>
	      <div><a href="#" target="main">项目审批</a> | <a href="#" target="main">管理</a></div>	 
	  	         
	  </div><br />
	  

	  <div class="hand" onclick="hide('hideMenuFunc1')">新闻管理</div>
	  <div id="hideMenuFunc1">
	      <div><a href="#" target="main">新闻管理</a> | <a href="#" target="main">管理</a></div>
		  <div><a href="#" target="main">新闻管理</a> | <a href="#" target="main">管理</a></div>
	      <div><a href="#" target="main">新闻管理</a> | <a href="#" target="main">管理</a></div>	
		  </div><br />

	  <div class="hand" onclick="hide('hideMenuFunc0')">系统管理</div>
	  <div id="hideMenuFunc0">
	      <div><a href="opergl.php" target="main">管理员权限</a> | <a href="operadd.php" target="main">添加管理员</a></div>
		  <div><a href="opertx.php" target="main">管理员通讯录</a></div>
		  <div><a href="opermenpwd.php" target="main">人员密码查询</a></div>
		  <div><a href="opermultiuser.php" target="main">重复帐号管理</a></div>
	  </div><br />

	  <div class="hand" onclick="hide('hideMenuFunc3')">人员管理</div>
	  <div id="hideMenuFunc3">
	      <div><a href="membergl.php" target="main">人员信息审核及管理</a></div>
		  <div><a href="memberpwd.php" target="main">人员密码查询</a></div>
		  <div><a href="memberadd.php" target="main">添加人员</a></div>		  
	  </div><br />
  

	  
  
   </div>
   	  <b class="rbottom">
         <b class="r4"></b>
         <b class="r3"></b>
         <b class="r2"></b>
         <b class="r1"></b>
      </b>
</div>

