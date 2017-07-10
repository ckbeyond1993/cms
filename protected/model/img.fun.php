<?php
/**
 * 生成验证码
 * @param int $num:字符数
 * @param int $size:大小
 * @param int $width:宽度
 * @param int $height:高度
 */
function vCode($num = 4, $size = 20, $width = 0, $height = 0) {
	if(empty($width)){
		$width = $num * $size * 4 / 5 + 5;
	}
	if(empty($height)){
		$height = $size + 10;
	}
	//组装随机字符
	// 去掉了 0 1 O l 等
	$str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
	$code = '';
	for ($i = 0; $i < $num; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	}
	// 画图像
	$im = imagecreatetruecolor($width, $height);
	// 定义要用到的颜色
	$back_color = imagecolorallocate($im, 235, 236, 237);
	$boer_color = imagecolorallocate($im, 118, 151, 199);
	$text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
	// 画背景
	imagefilledrectangle($im, 0, 0, $width, $height, $back_color);
	// 画边框
	imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color);
	// 画干扰线
	for($i = 0;$i < 5;$i++) {
		$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
	}
	// 画干扰点
	for($i = 0;$i < 50;$i++) {
		$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
	}
	// 画验证码
	imagefttext($im, $size , 0, 5, $size + 3, $text_color, 'resources/fonts/simsun.ttc', $code);
	$_SESSION["code"]=$code;//用session保存$code，方便验证
	header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
	header("Content-type: image/png;charset=utf8");
	ob_clean();  // ob_clean这个函数的作用就是用来丢弃输出缓冲区中的内容，如果你的网站有许多生成的图片类文件，那么想要访问正确，就要经常清除缓冲区。
	imagepng($im);
	imagedestroy($im);
}

/**
 * 生成缩略图
 * @param string $filename:源文件路径
 * @param string $thumb_img:缩略图路径
 * @return string 缩略图路径
 */
function thumb($filename,$thumb_img = 'test.jpg'){
	//获取原图
	$img=imagecreatefromjpeg($filename);
	//获取图片的宽度及高度
	$img_width=imagesx($img);
	$img_height=imagesy($img);
	//缩略图的宽度与高度
	$new_img_width=200;
	$new_img_height=150;
	//生成新图片（缩略图）
	$new_img=imagecreatetruecolor($new_img_width,$new_img_height);
	//创建新的图像对象(缩略图)
	imagecopyresized($new_img,$img,0,0,0,0,$new_img_width,$new_img_height,$img_width,$img_height);
	//imagecopyresized函数拷贝源图像的全部或部分并调整大小
	//生成图片
	imagejpeg($new_img,$thumb_img);
	//销毁图像
	imagedestroy($new_img);
	//返回缩略图
	return $thumb_img;
}

/**
 * 生成水印
 * @param string $dst_file:源文件
 * @param string $water_file:水印图片路径
 */
function water($dst_file,$water_file = 'photo/watermark.png'){
	//获取原图
	$dst_im = imagecreatefromjpeg($dst_file);
	//获取原图信息
	//$dst_info = getimagesize($dst_file);
	/*
	Array
	(
		[0] => 75 //宽
		[1] => 150 //高
		[2] => 2 //图像类型的标记 1 = GIF，2 = JPG，3 = PNG 详见手册
		[3] => width="75" height="150" //html标记，用于html
		[bits] => 8 //
		[channels] => 3 //
		[mime] => image/jpeg //类型
	)
	*/
	//获取水印图
	$water_im = imagecreatefrompng($water_file);
	//获取水印图信息
	//$water_info = getimagesize($water_file);
	$alpha = 50;//透明度
	//生成水印图
	//imagecopymerge($dst_im,$water_im,100,100,0,0,100,100,$alpha);//水印图留有白底
	imagecopy($dst_im,$water_im,100,100,0,0,120,119);//水印图无法透明，但不会留白底
	imagepng($dst_im,'photo/warter2.png');
	//销毁图像
	imagedestroy($dst_im);
	imagedestroy($water_im);
}