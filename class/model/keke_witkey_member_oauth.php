<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_oauth  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_oauth' );
			self::$pk = 'id';
		}
		 public function getId(){
			return self::$_data ['id'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		 public function getAccount(){
			return self::$_data ['account'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getOauth_id(){
			return self::$_data ['oauth_id'];
		}
		 public function getSession_key(){
			return self::$_data ['session_key'];
		}
		public function setId($value){
			return self::$_data ['id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
		public function setAccount($value){
			return self::$_data ['account'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setOauth_id($value){
			return self::$_data ['oauth_id'] = $value;
			$this;
		}
		public function setSession_key($value){
			return self::$_data ['session_key'] = $value;
			$this;
		}
}