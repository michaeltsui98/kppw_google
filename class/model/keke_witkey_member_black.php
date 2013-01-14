<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_black  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_black' );
			self::$pk = 'b_id';
		}
		 public function getB_id(){
			return self::$_data ['b_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getExpire(){
			return self::$_data ['expire'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getLogin_times(){
			return self::$_data ['login_times'];
		}
		public function setB_id($value){
			return self::$_data ['b_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setExpire($value){
			return self::$_data ['expire'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setLogin_times($value){
			return self::$_data ['login_times'] = $value;
			$this;
		}
}