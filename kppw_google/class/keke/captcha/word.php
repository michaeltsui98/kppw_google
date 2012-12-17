<?php defined ( 'IN_KEKE' ) or die ( 'Access Denied' );
/**
 * µ¥´ÊÀà
 *
 */
class Keke_captcha_word extends Keke_captcha_basic
{
 
	public function generate_challenge(){
		 
		$words = Keke_captcha_config::get('words');   
		shuffle($words);

		 
		foreach ($words as $word){
			 
			if (abs(Keke_captcha::$config['complexity'] - strlen($word)) < 2)
				return strtoupper($word);
		}
		
		 
		return strtoupper($words[array_rand($words)]);
	}

} 