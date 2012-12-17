<?php
// require_once 'acache_class.php';
final class Keke_cache_eacc extends Keke_cache {
	
	function __construct(){
		if(!function_exists('eaccelerator_get')){ 
			throw new Keke_exception("eaccelerator dosn't load ,please loaded!");
		}
	}
	public function get($id) {
	   // $this->flush();
	  // $this->del($id);
		$result = eaccelerator_get ( $id );
		return $result !== NULL ? $result : false;
	}

	public function set($id, $value, $expire = null) {
//		var_dump($id, $value, $expire); 
        if($expire === null){
        	$expire = keke_cache::DEFAULT_CACHE_LIFE_TIME;
        }
		return eaccelerator_put($id,$value,$expire);
	}
	public function add($id, $value, $expire = 0, $dependency = null) {
	    return  false;
	}
	public function del($id) {
		return eaccelerator_rm($id);
	}
	public function del_all() {
		eaccelerator_gc();//Çå³ý¹ýÆÚ»º´æ
		eaccelerator_clear();
		eaccelerator_removed_scripts();
	}

}

?>