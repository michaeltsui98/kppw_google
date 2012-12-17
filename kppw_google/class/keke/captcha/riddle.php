<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ÃÔÓï ÑéÖ¤Àà
 *
 */
class Keke_captcha_riddle extends Keke_captcha
{
 
	private $riddle;

 
	public function generate_challenge(){
		$riddles = Keke_captcha_config::get('riddles');
 		$riddle = $riddles[array_rand($riddles)];
 		$this->riddle = $riddle[0];
		return (string) $riddle[1];
	}
	public function render($html = TRUE){
		return $this->riddle;
	}

}  