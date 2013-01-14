<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_mark_config  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_mark_config' );
			self::$pk = 'mark_config_id';
		}
		 public function getMark_config_id(){
			return self::$_data ['mark_config_id'];
		}
		 public function getObj(){
			return self::$_data ['obj'];
		}
		 public function getGood(){
			return self::$_data ['good'];
		}
		 public function getNormal(){
			return self::$_data ['normal'];
		}
		 public function getBad(){
			return self::$_data ['bad'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		public function setMark_config_id($value){
			return self::$_data ['mark_config_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setObj($value){
			return self::$_data ['obj'] = $value;
			$this;
		}
		public function setGood($value){
			return self::$_data ['good'] = $value;
			$this;
		}
		public function setNormal($value){
			return self::$_data ['normal'] = $value;
			$this;
		}
		public function setBad($value){
			return self::$_data ['bad'] = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
}