<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_auth  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_auth' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getRealname(){
			return self::$_data ['realname'];
		}
		 public function getMobile(){
			return self::$_data ['mobile'];
		}
		 public function getEnterprise(){
			return self::$_data ['enterprise'];
		}
		 public function getEmail(){
			return self::$_data ['email'];
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setRealname($value){
			return self::$_data ['realname'] = $value;
			$this;
		}
		public function setMobile($value){
			return self::$_data ['mobile'] = $value;
			$this;
		}
		public function setEnterprise($value){
			return self::$_data ['enterprise'] = $value;
			$this;
		}
		public function setEmail($value){
			return self::$_data ['email'] = $value;
			$this;
		}
}