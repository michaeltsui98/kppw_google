<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_oltime  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_oltime' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getUser_status(){
			return self::$_data ['user_status'];
		}
		 public function getLast_op_time(){
			return self::$_data ['last_op_time'];
		}
		 public function getOnline_total_time(){
			return self::$_data ['online_total_time'];
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
		public function setUser_status($value){
			return self::$_data ['user_status'] = $value;
			$this;
		}
		public function setLast_op_time($value){
			return self::$_data ['last_op_time'] = $value;
			$this;
		}
		public function setOnline_total_time($value){
			return self::$_data ['online_total_time'] = $value;
			$this;
		}
}