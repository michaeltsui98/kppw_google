<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getPassword(){
			return self::$_data ['password'];
		}
		 public function getSalt(){
			return self::$_data ['salt'];
		}
		 public function getSec_code(){
			return self::$_data ['sec_code'];
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
		public function setPassword($value){
			return self::$_data ['password'] = $value;
			$this;
		}
		public function setSalt($value){
			return self::$_data ['salt'] = $value;
			$this;
		}
		public function setSec_code($value){
			return self::$_data ['sec_code'] = $value;
			$this;
		}
}