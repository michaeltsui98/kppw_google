<?php  defined('IN_KEKE') or die('access denied');
/**
 * apc 主要功是opcode 缓存，这里是apc数据库的实现 类
 * @author Michael
 * @version 3.0
 *
 */
final class Keke_cache_apc extends Keke_cache {
	function __construct() {
		if(!extension_loaded('apc')) { 
			throw new Keke_exception( "apc_cache dosn't load ,please loaded!");
		}
	}
	public function get($id) {
		return apc_fetch($this->_sanitize_id($id));
	}
	public function mget($ids) {
		return apc_fetch($keys);
	}
	public function set($id, $value, $expire = 0, $dependency = null) {
		return apc_store($this->_sanitize_id($id),$value,$expire);
	}
	public function add($id, $value, $expire = 0, $dependency = null) {
		return apc_add($this->_sanitize_id($id),$value,$expire);
	}
	public function del($id) {
		return apc_delete($this->_sanitize_id($id));
	}
	public function del_all() {
		return apc_clear_cache('user');
	}
}


?>