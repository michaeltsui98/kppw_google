<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_auth_mobile  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_auth_mobile' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getMobile(){
			return self::$_data ['mobile'];
		}
		 public function getValid_code(){
			return self::$_data ['valid_code'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getAuth_status(){
			return self::$_data ['auth_status'];
		}
		 public function getAuth_time(){
			return self::$_data ['auth_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setMobile($value){
			return self::$_data ['mobile'] = $value;
			$this;
		}
		public function setValid_code($value){
			return self::$_data ['valid_code'] = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
			$this;
		}
		public function setAuth_status($value){
			return self::$_data ['auth_status'] = $value;
			$this;
		}
		public function setAuth_time($value){
			return self::$_data ['auth_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
}