<?php
class Keke_lang {
	
	static $_init_lang_set = array();
	private  static $_package = 'public';
	public static $_lang='cn';
 	public static function lang($key,$action=null,$package=null){
		$r = self::getlang($key, $action, $package);
		$package or $package = self::$_package;
		$action or $action = 'public';
	 	(KEKE_DEBUG==1 and !$r) and  $r = "lang:$key not found  please edit langfile lang/cn/{$package}/{$action}.php"; 
		return $r;
	}
	public static function package_init($package){
		self::$_package = $package;
		self::loadlang("public");
	}
	
	
	
	public static function loadlang($action,$package=null){
		global $_lang;
		$lang = self::load_lang_file($action,$package); 
		if (!empty($lang)){
		foreach ($lang as $k=>$v){
		 	self::$_init_lang_set[$k]=$v;
		 }
		 //self::$_init_lang_set = array_merge(self::$_init_lang_set,$lang);
		 $_lang =  self::$_init_lang_set;
		}
	}
	
	
	private static function getlang($key,$action,$package=null){
		if ($action){
			$lang = self::load_lang_file($action,$package);
			return $lang[$key];
		}
		else {
			return self::$_init_lang_set[$key];
		}
	}
	
	public static function get_lang(){
		$lang_arr =self::lang_type();
		$l = 'cn';
		if(isset($_COOKIE['keke_lang'])){
			$l = trim($_COOKIE['keke_lang']);
		}
		$lang_arr[$l] and $r=$l or $r = self::$_lang;
		return $r;
	}
	public static function lang_type(){
		return  array("cn"=>"简体中文","tw"=>"繁体中文","en"=>"English","ko"=>"korea");
	}
	public static function get_curr_list(){
		global $_lang;
		return array(
				'cn'=>array('CNY',$_lang['rmb']),
				'tw'=>array('HKD',$_lang['hkd']),
				'ko'=>array('KRW',$_lang['krw']),
				'en'=>array('USD',$_lang['usd'])
		);
	}
	private static function load_lang_file($action,$package=null){
		$r = self::get_lang();
		$package or $package = self::$_package;
		$file_name = S_ROOT."lang/".$r."/{$package}/{$action}.php";
		file_exists($file_name) and include $file_name;
		return $lang;
	}
	public  static function load_lang_class($class_name=null){
           
         self::loadlang($class_name,'public');
	}
	
}
?>