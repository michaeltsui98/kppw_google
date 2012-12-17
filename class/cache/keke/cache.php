<?php
/**
 * 
 * this is not free software
 * @example 
 * @author michael
 *
 */
abstract class Keke_cache{
	const DEFAULT_CACHE_LIFE_TIME = 3600;
	public $_config = array ();
	public $_enable = false;
	public static $instances = array();
	public static $_cache_default = CACHE_TYPE;
	public static $_id;
	/**
	 * 
	 * construct cache calss 
	 * @var string $cache_type  -- 'file' ,'sqlite','eacc','apc','mem','redis'
	 * @var array $config   --array(0=>array("host"=>"127.0.0.1","port"=>"11211"))
	 * @return cache obj 
	 */
	public static function instance($cache_driver = null, $config = null) {
		if ($cache_driver === null) {
			$cache_driver = Keke_Cache::$_cache_default;
		}
		if (isset ( Keke_Cache::$instances [$cache_driver] )) {
			return Keke_Cache::$instances [$cache_driver];
		}
		$class_name = "Keke_cache_$cache_driver";
		Keke_Cache::$instances [$cache_driver] = new $class_name ( $config );
		return Keke_Cache::$instances [$cache_driver];
	}
	public function generate_id($id) {
		self::$_id=TABLEPRE . mb_strcut( md5 ( $id ), 24, 32 ,CHARSET);
		return $this;
	}
	
	abstract public function get($id);
	abstract public function set($id, $val, $expire = null);
	abstract public function del($id);
	/**
	 * »º´æ×·¼Ó
	 * @param maxid $id
	 * @param maxid $val
	 */
	
	abstract public function add($id,$val);
	abstract public function del_all();
	final public function __clone() {
		throw new Keke_exception( 'Cloning of Cache objects is forbidden' );
	}
	public function get_id(){
		return self::$_id;
	}
	protected function _sanitize_id($id)
	{
		return str_replace(array('/', '\\', ' '), '_', $id);
	}
}
