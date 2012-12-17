<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * Alpha captcha class.
 *
 */
class Keke_captcha_alpha extends Keke_captcha 
{
	/**
	 *	生成随机字符串
	 * @return string 
	 */
	public function generate_challenge(){
		 
		$text = Keke::randomkeys(max(1, Keke_captcha::$config['complexity']));
		return $text;
	}

	/**
	 * 输出验证图象
	 * @param boolean $html  
	 * @return mixed
	 */
	public function render($html = TRUE)
	{
		
		// 创建    $this->image
		$this->image_create(Keke_captcha::$config['background']);

		// 添加随机干扰码
		if (empty(Keke_captcha::$config['background'])){
			$color1 = imagecolorallocate($this->image, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
			$color2 = imagecolorallocate($this->image, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
			$this->image_gradient($color1, $color2);
		}

		// 添加随机的圆形
		for ($i = 0, $count = mt_rand(10, Keke_captcha::$config['complexity'] * 3); $i < $count; $i++){
			$color = imagecolorallocatealpha($this->image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), mt_rand(80, 120));
			$size = mt_rand(5, Keke_captcha::$config['height'] / 3);
			imagefilledellipse($this->image, mt_rand(0, Keke_captcha::$config['width']), mt_rand(0, Keke_captcha::$config['height']), $size, $size, $color);
		}

		// 计算文字的大小与间距
		$default_size = min(Keke_captcha::$config['width'], Keke_captcha::$config['height'] * 2) / strlen($this->response);
		$spacing = (int) (Keke_captcha::$config['width'] * 0.9 / strlen($this->response));

		// 背景字符的属性
		$color_limit = mt_rand(96, 160);
		$chars = 'ABEFGJKLPQRTVY';

		// 为每个验证字符设置不同的属性
		for ($i = 0, $strlen = strlen($this->response); $i < $strlen; $i++)
		{
			// 如果有多个字体就使用不同的字体
			$font = Keke_captcha::$config['fontpath'].Keke_captcha::$config['fonts'][array_rand(Keke_captcha::$config['fonts'])];

			$angle = mt_rand(-40, 20);
			// 按图片高度，缩放字体大小
			$size = $default_size / 10 * mt_rand(8, 12);
			$box = imageftbbox($size, $angle, $font, $this->response[$i]);

			// 计算字符的起始坐标
			$x = $spacing / 4 + $i * $spacing;
			$y = Keke_captcha::$config['height'] / 2 + ($box[2] - $box[5]) / 4;

			// 绘画验证验字符
			// 设置随便的颜色，大小，旋转属性
			$color = imagecolorallocate($this->image, mt_rand(150, 255), mt_rand(200, 255), mt_rand(0, 255));

			// 将字符写到图片中
			imagefttext($this->image, $size, $angle, $x, $y, $color, $font, $this->response[$i]);

			//绘画‘ghots’的字符字母
			$text_color = imagecolorallocatealpha($this->image, mt_rand($color_limit + 8, 255), mt_rand($color_limit + 8, 255), mt_rand($color_limit + 8, 255), mt_rand(70, 120));
			$char = $chars[mt_rand(0, 13)];
			imagettftext($this->image, $size * 2, mt_rand(-45, 45), ($x - (mt_rand(5, 10))), ($y + (mt_rand(5, 10))), $text_color, $font, $char);
		}
		
		return $this->image_render($html);
	}

} // End Captcha Alpha Driver Class