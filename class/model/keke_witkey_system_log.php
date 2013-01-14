<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_system_log  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_system_log' );
			self::$pk = 'log_id';
		}
		 public function getLog_id(){
			return self::$_data ['log_id'];
		}
		 public function getLog_type(){
			return self::$_data ['log_type'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getUser_type(){
			return self::$_data ['user_type'];
		}
		 public function getLog_content(){
			return self::$_data ['log_content'];
		}
		 public function getLog_ip(){
			return self::$_data ['log_ip'];
		}
		 public function getLog_time(){
			return self::$_data ['log_time'];
		}
		public function setLog_id($value){
			return self::$_data ['log_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setLog_type($value){
			return self::$_data ['log_type'] = $value;
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
		public function setUser_type($value){
			return self::$_data ['user_type'] = $value;
			$this;
		}
		public function setLog_content($value){
			return self::$_data ['log_content'] = $value;
			$this;
		}
		public function setLog_ip($value){
			return self::$_data ['log_ip'] = $value;
			$this;
		}
		public function setLog_time($value){
			return self::$_data ['log_time'] = $value;
			$this;
		}
}