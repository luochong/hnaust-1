<?php
function subdept($id,$hostname,$dbusername,$dbpassword,$space,$field){	
	$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
	mysql_select_db("$dbname");
	$sql="select * from sns_group_dept where dept_father_id='$id'";
	$query=mysql_query($sql,$hwnd);
	$nums=mysql_num_rows($query);
	$space=$space."&nbsp;&nbsp;&nbsp;&nbsp;";
	if($nums>=1){
		while($array=mysql_fetch_array($query)){		
			echo "<option value='$array[$field]'>$space$array[dept_name]</option>";
			subdept($array[id],$hostname,$dbusername,$dbpassword,$space,$field);
		}
	}
	else{
		return;
	}
}

function subdept_m($id,$hostname,$dbusername,$dbpassword,$space,$field,$svalue){	
	$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
	mysql_select_db("$dbname");
	$sql="select * from sns_group_dept where dept_father_id='$id'";
	$query=mysql_query($sql,$hwnd);
	$nums=mysql_num_rows($query);
	$space=$space."&nbsp;&nbsp;&nbsp;&nbsp;";
	if($nums>=1){
		while($array=mysql_fetch_array($query)){	
			if($array[$field] == $svalue)$sele_m = "selected";else $sele_m = "";
			echo "<option value='$array[$field]' $sele_m >$space$array[dept_name]</option>";
			subdept($array[id],$hostname,$dbusername,$dbpassword,$space,$field,$svalue);
		}
	}
	else{
		return;
	}
}
/*
function subdept_1($id,$hostname,$dbusername,$dbpassword,$space){	
	$hwnd=mysql_connect("$hostname","$dbusername","$dbpassword");
	mysql_select_db("$dbname");
	$sql="select * from sns_group_dept where dept_father_id='$id'";
	$query=mysql_query($sql,$hwnd);
	$nums=mysql_num_rows($query);
	$space=$space."&nbsp;&nbsp;&nbsp;&nbsp;";
	if($nums>=1){
		while($array=mysql_fetch_array($query)){		
			echo "<option value='$array[dept_sub]'>$space$array[dept_name]</option>";
			subdept_1($array[id],$hostname,$dbusername,$dbpassword,$space);
		}
	}
	else{
		return;
	}
}
*/
function page($hwnd,$chaxun,$page,$pagenum,$cs){  
 //$hwnd表示连接数据库的句柄  $chaxun表示查询的条件 $page表示网页文件名 $pagenum表示每页显示的记录条数
			$chaxun=$chaxun;		
			mysql_query("SET NAMES 'utf8'",$hwnd);			
            $resu=mysql_query($chaxun,$hwnd);
			$nums=mysql_num_rows($resu);
			$ye=$_GET['ye'];	
			$pagenum=$pagenum;
			$page=$page;
            $gye=ceil($nums/$pagenum);
            if($gye==0){$gye=1;}
            if($ye=="" || $gye<$ye){$ye=1;}
            echo "共".$nums."记录&nbsp;第".$ye."页/共".$gye."页&nbsp;";			
            if($ye!=1){
            $yeb=$ye-1;
            echo "<a href='$page?ye=1$cs'>首页</a>&nbsp;<a href='$page?ye=$yeb$cs'>上一页</a>&nbsp;";
            }
            if($ye!=$gye){
            $yen=$ye+1;
            echo "<a href='$page?ye=$yen$cs'>下一页</a>&nbsp;<a href='$page?ye=$gye$cs'>末页</a>";
            }
			echo "&nbsp;";
			
			$pageflag=10;               //每块显示多少页
			$page_r=ceil($gye/$pageflag);//分多少块显示
			$k=ceil($ye/$pageflag);
			if($k==1)echo "<a href='$page?ye=$k$cs'> << </a>&nbsp;";
			  else{
			    $m=($k-1)*$pageflag-4;
			  	echo "<a href='$page?ye=$m$cs'> << </a>&nbsp;";
			  }  
			if($k<$page_r)$n=$pageflag;
			 else $n=$gye-($k-1)*$pageflag;
			for($i=1;$i<=$n;$i++){					
			    $k_1=($k-1)*$pageflag+$i;
				if($k_1==$ye){
					echo "<a href='$page?ye=$k_1$cs'>$k_1</a>&nbsp;";
				}
				else{
					echo "<a href='$page?ye=$k_1$cs'>[$k_1]</a>&nbsp;";
				}
				
			}
			if($k==$page_r){
				echo "<a href='$page?ye=$gye$cs'> >> </a>&nbsp;";
			}
			  else{
			    $m=$k*$pageflag+1;
			  	echo "<a href='$page?ye=$m$cs'> >> </a>&nbsp;";
			  } 
			
			$lim1=($ye-1)*$pagenum;
			$chaxun=$chaxun." limit $lim1,$pagenum";
			return($gye);			
}

function page_r($hwnd,$chaxun,$page,$pagenum,$cs){  
			$chaxun=$chaxun;
			mysql_query("SET NAMES 'utf8'",$hwnd);
            $resu=mysql_query($chaxun,$hwnd);			
			$nums=mysql_num_rows($resu);
			$ye=$_GET['ye'];	
			$pagenum=$pagenum;
			$page=$page;
            $gye=ceil($nums/$pagenum);			
            if($gye==0){$gye=1;}			
            if($ye=="" || $gye<$ye){$ye=1;}			
			$lim1=($ye-1)*$pagenum;
			$chaxun=$chaxun." limit $lim1,$pagenum";
			return($chaxun);
}
function deptname($hwnd,$admin_dept_id,$admin_user){
	$sql="select * from sns_group_admin where admin_dept_id='$admin_dept_id' and admin_user='$admin_user' ";
	$query=mysql_query($sql,$hwnd);
	$array=mysql_fetch_array($query);
	$depttree=$array[admin_dept_tree];
	$i=0;
	$depttree=explode(":", $depttree);
	while(list($k,$sid)=each($depttree)){					
		$array_id[$i++]=$sid;
	}
	if($i==1)$deptid=$array_id[0];
		else $deptid=$array_id[1];
	$sql="select *from sns_group_dept where id='$deptid'";
	$query=mysql_query($sql,$hwnd);
	$array=mysql_fetch_array($query);
	return($array[dept_name]);
}
?>