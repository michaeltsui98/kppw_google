<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 黑色的验证码类
 */
class Keke_captcha_black extends Keke_captcha {
	
	public function generate_challenge() {
		 
		$text = Keke::randomkeys ( max ( 1, Keke_captcha::$config ['complexity'] ) );
		
		return $text;
	}
 
	public function render($html = TRUE) {
	 	$this->image_create ( Keke_captcha::$config ['background'] );
	 	$count = (Keke_captcha::$config ['width'] + Keke_captcha::$config ['height']) / 2;
		$count = $count / 5 * min ( 10, Keke_captcha::$config ['complexity'] );
		for($i = 0; $i < $count; $i ++) {
			imagesetthickness ( $this->image, mt_rand ( 1, 2 ) );
			$color = imagecolorallocatealpha ( $this->image, 255, 255, 255, mt_rand ( 0, 120 ) );
			imagearc ( $this->image, mt_rand ( - Keke_captcha::$config ['width'], Keke_captcha::$config ['width'] ), mt_rand ( - Keke_captcha::$config ['height'], Keke_captcha::$config ['height'] ), mt_rand ( - Keke_captcha::$config ['width'], Keke_captcha::$config ['width'] ), mt_rand ( - Keke_captcha::$config ['height'], Keke_captcha::$config ['height'] ), mt_rand ( 0, 360 ), mt_rand ( 0, 360 ), $color );
		}
		
	 	$font = Keke_captcha::$config ['fontpath'] . Keke_captcha::$config ['fonts'] [array_rand ( Keke_captcha::$config ['fonts'] )];
		
	 	$size = ( int ) min ( Keke_captcha::$config ['height'] / 2, Keke_captcha::$config ['width'] * 0.8 / strlen ( $this->response ) );
		$angle = mt_rand ( - 15 + strlen ( $this->response ), 15 - strlen ( $this->response ) );
		$x = mt_rand ( 1, Keke_captcha::$config ['width'] * 0.9 - $size * strlen ( $this->response ) );
		$y = ((Keke_captcha::$config ['height'] - $size) / 2) + $size;
		$color = imagecolorallocate ( $this->image, 255, 255, 255 );
		imagefttext ( $this->image, $size, $angle, $x + 1, $y + 1, $color, $font, $this->response );
		
		(Keke_captcha::$config ['complexity'] < 10) and imagefttext ( $this->image, $size, $angle, $x - 1, $y - 1, $color, $font, $this->response );
		(Keke_captcha::$config ['complexity'] < 8) and imagefttext ( $this->image, $size, $angle, $x - 2, $y + 2, $color, $font, $this->response );
		(Keke_captcha::$config ['complexity'] < 6) and imagefttext ( $this->image, $size, $angle, $x + 2, $y - 2, $color, $font, $this->response );
		(Keke_captcha::$config ['complexity'] < 4) and imagefttext ( $this->image, $size, $angle, $x + 3, $y + 3, $color, $font, $this->response );
		(Keke_captcha::$config ['complexity'] < 2) and imagefttext ( $this->image, $size, $angle, $x - 3, $y - 3, $color, $font, $this->response );
		
		 
		$color = imagecolorallocate ( $this->image, 0, 0, 0 );
		imagefttext ( $this->image, $size, $angle, $x, $y, $color, $font, $this->response );
		 
		return $this->image_render ( $html );
	}

}  