<?php  defined('IN_KEKE') or die('access is deined');
/**
 * 多语言类
 * 不同的语言文件放在不同的目录，指定目录的加载这个目录下的public.php
 * 加载优先级,public/public.php，$dir/public.php，再加载指定的lang.php
 * @author Michael
 * @version 3.0 2012-12-07
 *
 */
class Keke_lang {
	
	/**
	 * @var 默认语言目录
	 */
	private $_default = 'public';
	/**
	 * @var 语言目录 
	 */
	private  $_dir = 'public';
	/**
	 * @var 当前语言包   : cn,tw,en,ko
	 */
	public static $lang='cn';
	
	private static $_caches;
	
	private static $_instance;
	
	/**
	 * 加载的文件列表，用来调试
	 */
	public static $_files = array();
	/**
	 * 当前语言列表
	 */
	public static $lang_list =  array(
			"cn"=>"简体中文",
			"tw"=>"繁体中文",
			"en"=>"English",
			"ko"=>"korea");
	/**
	 * 单例
	 * @return Keke_lang
	 */
	public static function get_instance() {
		if(self::$_instance){
			return self::$_instance;
		}
		self::$_instance = new self();
		return self::$_instance;
	}
	/**
	 * 指定目录
	 * @param string $dir
	 * @return Keke_lang
	 */
	function set_dir($dir){
		$this->_dir = $dir;
		return $this;
	}
	
	/**
	 * 返回指定的 key 的value;
	 * @param string $key
	 * @return string
	 */
	function lang($key){
		global $_lang;
		return $_lang[$key];
	}
	/**
	 * 加载lang数组，并将lang设为全局变量
	 * @param string $class lang文件
	 */
	public function load($class){
		
		$this->load_public(); 
		
		$this->load_file($class); 
		
		
	}
	
	public function load_public(){
		$lang = array();
		$p_name = S_ROOT.'lang/'.$this->get_lang()."/public/public.php";
		$files = array_flip(self::$_files);
		if(isset($files[$p_name])){
			return ;
		}
		include $p_name ;
		$this->init_lang($lang);
		self::$_files[] = $p_name;
 
	}
	/**
	 * 加载指定的语言文件
	 * @param string $class 语言包文件
	 * @param string $dir  目录
	 * @return array
	 */
	public  function load_file($class){
		$lang  = array();
		$r = self::get_lang();
		$dir = $this->_dir;
		$file_name = S_ROOT.'lang/'.$r."/{$dir}/{$class}.php";
		//目录下的公共文件
		$p_name = S_ROOT.'lang/'.$r."/{$dir}/public.php";
		
		//已经加载了就不再加载
		//$files = array_flip(self::$_files);
		
		/* if(isset($files[$p_name])){
			return ;
		} */
		
	 	
		if(file_exists($p_name) AND $this->_default != $this->_dir){
			self::$_files[] = $p_name;
			include $p_name;
			$this->init_lang($lang);
		}
 		if(file_exists($file_name)){
			self::$_files[] = $file_name;
			include $file_name;
			$this->init_lang($lang);
		}
	}
	
	public function init_lang($lang){
		global $_lang;
		foreach ($lang as $k=>$v){
			$_lang[$k] =$v;
		}
	}
	
	public static function cache_files(){
		Keke::cache('load_lang',array_flip(self::$_files));	
	}
	
	/**
	 * 加载类的语言文件
	 * @param string $class_name
	 */ 
	public static function load_lang_class($class,$dir='public'){
		 Keke_lang::get_instance()->set_dir($dir)->load_file($class);
	}
	
	/**
	 * 返回当前语言
	 * @return string
	 */
	public static function get_lang(){
		$lang_arr =self::$lang_list;
		$l = Cookie::get('keke_lang');
		if(!isset($lang_arr[$l])){
			$l = self::$lang;
		}
		return $l;
	}
	/**
	 * 语言与货币的对应数组
	 * @return array
	 */
	public static function get_curr_list(){
		global $_lang;
		return array(
				'cn'=>array('CNY',$_lang['rmb']),
				'tw'=>array('HKD',$_lang['hkd']),
				'ko'=>array('KRW',$_lang['krw']),
				'en'=>array('USD',$_lang['usd'])
		);
	}
	
}//end