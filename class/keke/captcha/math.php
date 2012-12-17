<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 数学验证类
 *
 */
class Keke_captcha_math extends Keke_captcha
{
	 
	private $math_exercise;

	 
	public function generate_challenge()
	{
		// 简单
		if (Keke_captcha::$config['complexity'] < 4){
			$numbers[] = mt_rand(1, 5);
			$numbers[] = mt_rand(1, 4);
		}
		// 基本
		elseif (Keke_captcha::$config['complexity'] < 7)
		{
			$numbers[] = mt_rand(10, 20);
			$numbers[] = mt_rand(1, 10);
		}
		// 困难
		else
		{
			$numbers[] = mt_rand(100, 200);
			$numbers[] = mt_rand(10, 20);
			$numbers[] = mt_rand(1, 10);
		}
 
		$this->math_exercise = implode(' + ', $numbers).' = ';

		 
		return array_sum($numbers);
	}

 
	public function render($html = TRUE)
	{
		return $this->math_exercise;
	}

}  