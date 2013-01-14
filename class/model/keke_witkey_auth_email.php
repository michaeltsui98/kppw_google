<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_auth_email  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_auth_email' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getEmail(){
			return self::$_data ['email'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getAuth_time(){
			return self::$_data ['auth_time'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getAuth_status(){
			return self::$_data ['auth_status'];
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
		public function setEmail($value){
			return self::$_data ['email'] = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
			$this;
		}
		public function setAuth_time($value){
			return self::$_data ['auth_time'] = $value;
			$this;
		}
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setAuth_status($value){
			return self::$_data ['auth_status'] = $value;
			$this;
		}
}