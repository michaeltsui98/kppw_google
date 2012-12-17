<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );


/**
 * 基本的验证码类
 */
class Keke_captcha_basic extends Keke_captcha {
	
	public function generate_challenge() {
		
		$text = Keke::randomkeys ( max ( 1, Keke_captcha::$config ['complexity'] ) );
		
		return $text;
	}
	
	/**
	 * 输出验证图象
	 * 
	 * @param boolean $html        	
	 * @return mixed
	 */
	public function render($html = TRUE) {
		
		$this->image_create ( Keke_captcha::$config ['background'] );
		
		if (empty ( Keke_captcha::$config ['background'] )) {
			$color1 = imagecolorallocate ( $this->image, mt_rand ( 200, 255 ), mt_rand ( 200, 255 ), mt_rand ( 150, 255 ) );
			$color2 = imagecolorallocate ( $this->image, mt_rand ( 200, 255 ), mt_rand ( 200, 255 ), mt_rand ( 150, 255 ) );
			$this->image_gradient ( $color1, $color2 );
		}
		
		for($i = 0, $count = mt_rand ( 5, Keke_captcha::$config ['complexity'] * 4 ); $i < $count; $i ++) {
			$color = imagecolorallocatealpha ( $this->image, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 100, 255 ), mt_rand ( 50, 120 ) );
			imageline ( $this->image, mt_rand ( 0, Keke_captcha::$config ['width'] ), 0, mt_rand ( 0, Keke_captcha::$config ['width'] ), Keke_captcha::$config ['height'], $color );
		}
		
		$default_size = min ( Keke_captcha::$config ['width'], Keke_captcha::$config ['height'] * 2 ) / (strlen ( $this->response ) + 1);
		$spacing = ( int ) (Keke_captcha::$config ['width'] * 0.9 / strlen ( $this->response ));
		
		for($i = 0, $strlen = strlen ( $this->response ); $i < $strlen; $i ++) {
			
			$font = Keke_captcha::$config ['fontpath'] . Keke_captcha::$config ['fonts'] [array_rand ( Keke_captcha::$config ['fonts'] )];
			
			$color = imagecolorallocate ( $this->image, mt_rand ( 0, 150 ), mt_rand ( 0, 150 ), mt_rand ( 0, 150 ) );
			$angle = mt_rand ( - 40, 20 );
			
			$size = $default_size / 10 * mt_rand ( 8, 12 );
			$box = imageftbbox ( $size, $angle, $font, $this->response [$i] );
			
			$x = $spacing / 4 + $i * $spacing;
			$y = Keke_captcha::$config ['height'] / 2 + ($box [2] - $box [5]) / 4;
			
			imagefttext ( $this->image, $size, $angle, $x, $y, $color, $font, $this->response [$i] );
		}
		
		return $this->image_render ( $html );
	}

} // End Captcha Basic Driver Class