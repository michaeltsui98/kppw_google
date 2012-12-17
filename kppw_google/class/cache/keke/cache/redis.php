<?php
/**
 * redis 是noSql的一种，也可以用来做主库，现在只是用来做缓存处理。。
 * phpredis 缓存类
 * @author michael
 *
 */
final class Keke_cache_redis extends Keke_cache {
	protected static $_redis;
	function __construct($config=array()) {
		if(!extension_loaded('redis')) { 
			throw new Keke_exception( "Redis dosn't load ,please loaded!");
		}
		/**
		    $config = array('host'=>'localhost','port'=>'6379');
		    timeout: 0 代表永久，一般默认为300秒
		 */
		$this->_config = $config;
		$this->set_server();
	}
	/**
	 * 这里暂时用只支持单台服务器的操作，在多台服务器的模式下建议
	 * 使用master,salve模式，一主多从模式，用master异步更新到salve
	 * 由salve 做持久化处理.不要用master做持久化，会对性能有影响
	 */
	public function set_server(){
		self::$_redis = new redis();
		if(is_array($this->_config)){
		   	self::$_redis->connect($this->_config['host'],$this->_config['port']);
		}else{
			self::$_redis->connect('127.0.0.1','6379');
		}
	}
	/**
	 * 获取普通String键的值
	 * @see Keke_cache::get()
	 */
	public function get($id) {
		return self::$_redis->get($id);
	}
	/**
	 * @param array $ids 
	 * @param unknown_type $ids
	 */
	public function mget($ids) {
		return self::$_redis->mget($ids);
	}
	/**
	 * 这里的set只对String 的值有效
	 * @see Keke_cache::set()
	 */
	public function set($id, $value, $expire = 0, $dependency = null) {
		return self::$_redis->set($id,$value,$expire);
	}
	
	/**
	 * redis 的ADD 方法对应是append(key,vale);
	 * 在原来键值上进行追加，对时间人操作无效.
	 * @param string $id
	 * @param string $value
	 * @param int $expire
	 * @param string $dependency
	 */
	public function add($id, $value, $expire = 0, $dependency = null) {
	     return self::$_redis->append($id,$value);
		
	}
	/**
	 * del('key1');
	 * del('key1','key2');
	 * del(array('key1','key2'));
	 * 支持以上两种模式
	 * @param maxid $id 字符串，或者是数组
	 * @see Keke_cache::del()
	 */
	public function del($id) {
		return self::$_redis->delete($id);
	}
	public function del_all() {
		return self::$_redis->flushall();
	}
	public function __destruct(){
		self::$_redis->close();
	}
}//end