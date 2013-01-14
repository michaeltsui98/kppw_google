<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_session  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_session' );
			self::$pk = 'session_id';
		}
		 public function getSession_id(){
			return self::$_data ['session_id'];
		}
		 public function getSession_expirse(){
			return self::$_data ['session_expirse'];
		}
		 public function getSession_data(){
			return self::$_data ['session_data'];
		}
		 public function getSession_ip(){
			return self::$_data ['session_ip'];
		}
		 public function getSession_uid(){
			return self::$_data ['session_uid'];
		}
		public function setSession_id($value){
			return self::$_data ['session_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setSession_expirse($value){
			return self::$_data ['session_expirse'] = $value;
			$this;
		}
		public function setSession_data($value){
			return self::$_data ['session_data'] = $value;
			$this;
		}
		public function setSession_ip($value){
			return self::$_data ['session_ip'] = $value;
			$this;
		}
		public function setSession_uid($value){
			return self::$_data ['session_uid'] = $value;
			$this;
		}
}