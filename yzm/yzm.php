<?php
ob_start();
session_start();
session_register('Captcha');
$path="./";//字体文件路径
$width = "70";//图片宽
$height = "25";//图片高
$len = "4";//生成几位验证码
$bgcolor = "#000000";//背景色
$noise = true;//生成杂点
$noisenum = 100;//杂点数量
$border = false;//边框
$bordercolor = "#000000";
$code = '';

$image = imageCreate($width, $height);
$back = getcolor($bgcolor);
imageFilledRectangle($image, 0, 0, $width, $height, $back);
$size = $width/$len;
if($size>$height) $size=$height;
$left = ($width-$len*($size+$size/10))/$size;
for ($i=0; $i<$len; $i++)
{
	$a=rand(0,2);
	switch($a){
	case 0:	
		    $randtext =chr(rand(48,57));
			break;
	case 1:
	case 2:
			$randtext =chr(rand(65,90));
			break;
	case 3:$randtext =chr(rand(97,122));
	
	
	}
	
    $code .= $randtext;
	$textColor = imageColorAllocate($image, 100, 100, 100);
	$font = $path.rand(1,3).".ttf"; 
	$randsize = rand($size-$size/10, $size+$size/10);
	$location = $left+($i*$size+$size/10);
	imagettftext($image, $size, 0, $location, $size+2, $textColor, $font, $randtext); 
}
if($noise == true) setnoise();

$_SESSION['yzm'] = $code;
$bordercolor = getcolor($bordercolor); 
if($border==true) imageRectangle($image, 0, 0, $width-1, $height-1, $bordercolor);
ob_clean();
header("Content-type: image/png");
imagePng($image);
imagedestroy($image);
function getcolor($color)
{
     global $image;
     $color = eregi_replace ("^#","",$color);
     $r = $color[0].$color[1];
     $r = hexdec ($r);
     $b = $color[2].$color[3];
     $b = hexdec ($b);
     $g = $color[4].$color[5];
     $g = hexdec ($g);
     $color = imagecolorallocate ($image, $r, $b, $g); 
     return $color;
}
function setnoise()
{
	global $image, $width, $height, $back, $noisenum;
	for ($i=0; $i<$noisenum; $i++){
		$randColor = imageColorAllocate($image, rand(0, 255), rand(0, 255), rand(0, 255));  
		imageSetPixel($image, rand(0, $width), rand(0, $height), $randColor);
	} 
}


