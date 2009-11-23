<?php
require_once('../../../lib/LCBase.class.php');
$config=new Config();


$Prve=strtolower($_SERVER['HTTP_REFERER']);
  $Onpage=strtolower($_SERVER["HTTP_HOST"]);
  $Onnym=strpos($Prve,$Onpage);
  if(!$Onnym) exit("<script language='javascript'>alert('非法操作！');history.go(-1);</script>");
  
                                                                                                   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>上传文件</title>
<style type="text/css">
 body {font:12px Tahoma;font-family:"宋体";margin:0px;background:#FFF;}
 body,form,ul,li,p,dl,dd,dt,h,td,th,h3{padding:0;font-size:12px;color:#444;}
</style>
</head>
<body>
<?php
$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/bmp','image/x-png');
/*
$UpPath_Url = "http://".$_SERVER["SERVER_NAME"]. $_SERVER["PHP_SELF"];
$UpPath_Url = explode("/upapi/upfile.php",$UpPath_Url);
$UpPath_Url = explode("/",$UpPath_Url[0]);
$UpPath     = "";
for($u=0;$u<count($UpPath_Url)-1;$u++){
	$UpPath .= $UpPath_Url[$u]."/";
}
$UpPath .= "Api_Uppic";
*/
$max_file_size=2000000; //上传文件大小限制, 单位BYTE
//$pathpre="./../../Api_Uppic";
$UpPath = $config->http_host_name;
$path = $config->app_root.'/app'.$config->upfile_path.'/'.date('Y-m',time());
if(!is_dir($path))mkdir($path);
$destination_folder=$path.'/'.date('Y-m-d',time()).'/'; //上传文件路径

$authnum=rand()%10000;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
   if (!is_uploaded_file($_FILES["file"][tmp_name])){//是否存在文件
       echo "<script language=javascript>alert('请先选择你要上传的文件！');history.go(-1);</script>";
       exit();
   }
   $user_id = $_POST['user_id'];  
   $file = $_FILES["file"];

   if($max_file_size < $file["size"]){//检查文件大小
	   echo "<script language=javascript>alert('文件大小不能超过2M！');history.go(-1);</script>";
       exit();
   }

   if(!in_array($file["type"], $uptypes)){//检查文件类型
       echo "文件类型不符!".$file["type"];
       exit();
   }

   if(!file_exists($pathpre.$destination_folder)){ 
       mkdir($pathpre.$destination_folder);
   }

   $filename=$file["tmp_name"];
   $image_size = getimagesize($filename);
   $pinfo=pathinfo($file["name"]);
   $ftype=$pinfo['extension'];
   $destination = $pathpre.$destination_folder.date("YmdHis",time()).$authnum.".".$ftype;

   if (file_exists($destination) && $overwrite != true){ 
       echo "<script language=javascript>alert('同名文件已经存在了！');history.go(-1);</script>";
       exit();
   }

   if(!move_uploaded_file ($filename, $destination)){ 
       echo "<script language=javascript>alert('移动文件出错！');history.go(-1);</script>";
       exit();
   }
	
	//如何宽度大于470px，长度大于370px，对图片进行缩略
	list($width,$height,$type) = getimagesize($destination);
	if($width > 450 || $height > 370) {
		$src = createImageFromFile($destination);
		
		//设置缩略图的宽度和高度
		$ret = setWidthAndHeight($width,$height);
		
		$dst = imagecreatetruecolor($ret[0],$ret[1]);//创建输出图像
		imagecopyresampled($dst,$src,0,0,0,0,$ret[0],$ret[1],$width,$height);//拷贝图像
		
		save($destination,$type,$dst);
	}
	 
   $pinfo=pathinfo($destination);
   $fname=$pinfo[basename];   
   //路径问题
   $destination_folder=str_replace("\\","/",$destination_folder);   
	
   $turepath=$config->app_root.'/app';
 	
   $turepath=str_replace('\\','/',$turepath);
  	
 	
 	$destination_folder=str_replace($turepath,'',$destination_folder);   
   
  	//绝对路径
  	$picture_name = $UpPath.$destination_folder.$fname;

  	//相对路径
  	$fileurl = $destination_folder.$fname;

   
   

   //insertIntoUpload($fileurl,$file['name'],$fname,$image_size,$file['type'],$user_id);
   
   echo "<script language=javascript>\r\n";
   echo "window.parent.document.getElementById('picture').value='$picture_name';\r\n";
   echo "window.location.href='upload.php';\r\n";
   echo "</script>\r\n";

   
   // " 宽度:".$image_size[0];
   // " 长度:".$image_size[1];
   // "<br> 大小:".$file["size"]." bytes";

}

/**
	 * 创建不同类型的图像
	 *
	 * @param is_string $file_name
	 * @return resource
	 */
	
	function createImageFromFile($file_name) {
		if(!is_file($file_name) || !is_readable($file_name)) {
			return die("不能打开这个图片:$file_name");
		}
		//获取图片信息
		list($w,$h,$type) = getimagesize($file_name);
		
		switch ($type) {
			case IMAGETYPE_JPEG:
				return imagecreatefromjpeg($file_name);
				break;
			case IMAGETYPE_GIF:
				return imagecreatefromgif($file_name);
				break;
			case IMAGETYPE_PNG:
				return imagecreatefrompng($file_name);
				break;
			case IMAGETYPE_WBMP:
				return imagecreatefromwbmp($file_name);
				break;
			case IMAGETYPE_XBM:
				return imagecreatefromxbm($file_name);
				break;
			default:
				throw new Exception('不支持这种图片类型');
		}
	}
	
	/**
	 * 根据高度和宽度缩略
	 *
	 * @param int $width
	 * @param int $height
	 */
	function setWidthAndHeight($width,$height) {
		$ratio = $width / $height;
		$maxWidth = min($width,450);
		if($maxWidth == 0)
			$maxWidth = $width;
			
		$maxHeight = min($height,370);
		if($maxHeight == 0) 
			$maxHeight = $height;
		
		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
			
		if($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
		
		return $ret;
	}
	/**
	*图片输出
	*/
	function save($path,$type,$dst) {
		switch ($type) {
			case IMAGETYPE_GIF:
				$res = imagegif($dst,$path);
				break;
			case IMAGETYPE_JPEG:
				$res = imagejpeg($dst,$path);
				break;
			case IMAGETYPE_PNG:
				$res = imagepng($dst,$path);
				break;
			case IMAGETYPE_WBMP:
				$res = imagewbmp($dst,$path);
				break;
			default:
				throw new Exception("php不支持$type类型的图片");		
		}
		return true;
	}
	/**
	*插入上传到数据库
	*
	*/
	
?>
</body>
</html>