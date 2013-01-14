<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_mark_aid  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_mark_aid' );
			self::$pk = 'aid';
		}
		 public function getAid(){
			return self::$_data ['aid'];
		}
		 public function getAid_name(){
			return self::$_data ['aid_name'];
		}
		 public function getAid_type(){
			return self::$_data ['aid_type'];
		}
		public function setAid($value){
			return self::$_data ['aid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setAid_name($value){
			return self::$_data ['aid_name'] = $value;
			$this;
		}
		public function setAid_type($value){
			return self::$_data ['aid_type'] = $value;
			$this;
		}
}