<?php
///	[Product]
///		素质拓展学分认证系统
///
///	[Copyright]
///		Copyright 2007-2008 prolove. All rights reserved.
///
///	[Filename]
///		学生项目申请首页
///
///	[Description]
///		学生项目申请首页页面
///
///	[History]
///		Date        	Version  	Author    	Content
///		---------- 	 -------  	--------  	 ------------------------------------
///	    2009/11/16      1.1    	龙首成      	  学生管理
require("include/sessionstud.php");
require("stud_home.class.php");
//echo $_SESSION["studno"];
$studno=$_SESSION["studno"];
$show=new stud();

//$studid=2007;
$showinfo=$show->showstud($studno);
$showitem=$show->showitem($studno);
for($i=0;$i<count($showitem);$i++)
{
   
        $itemcode[]=$showitem[$i][2];
    
}
//print_r($itemcode);
$itemdetail=$show->finditem($itemcode);

$_SESSION['stud_no']=$showinfo[0][1];
$_SESSION['stud_name']=$showinfo[0][2];
$_SESSION['stud_sex']=$showinfo[0][3];
$_SESSION['stud_']=$showinfo[0][4];
$_SESSION['stud_no']=$showinfo[0][5];
$_SESSION['stud_no']=$showinfo[0][6];
$_SESSION['stud_no']=$showinfo[0][7];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
</head>
<body>
<a href="stud_addapp.php">添加项目</a>
<?php
             if(count($showinfo)!==0)
             {
              
                     echo $showinfo[0][1];
                     echo $showinfo[0][2];
                     echo $showinfo[0][3];
                     echo $showinfo[0][4];
                     echo $showinfo[0][5];
                     echo $showinfo[0][6];
                     echo $showinfo[0][7];
                     
              
             } 
           
?>

<br />
<?php
           if(count($showitem)!==0)
                 {
                      // print_r($itemdetail);
                   for($n=0;$n<3;$n++)
                    {
                        for($i=0;$i<7;$i++)
                        {
                          
                          
                                echo   $itemdetail[0][$n][$i];
                              
                            
                        }
                       // print_r($showitem);
                        echo $showitem[$n][4];
                      echo "<br>";
                   }
            
                
                 }
                 else 
                 {echo "你还未申请";} 

?>
<?php    
           
           

?>


  

</body>
</html>