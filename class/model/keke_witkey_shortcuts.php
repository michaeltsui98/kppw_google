<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_shortcuts  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_shortcuts' );
			self::$pk = 's_id';
		}
		 public function getS_id(){
			return self::$_data ['s_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getResource_id(){
			return self::$_data ['resource_id'];
		}
		public function setS_id($value){
			return self::$_data ['s_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setResource_id($value){
			return self::$_data ['resource_id'] = $value;
			$this;
		}
}