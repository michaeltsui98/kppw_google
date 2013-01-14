<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_msg  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_msg' );
			self::$pk = 'msg_id';
		}
		 public function getMsg_id(){
			return self::$_data ['msg_id'];
		}
		 public function getMsg_pid(){
			return self::$_data ['msg_pid'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getTo_uid(){
			return self::$_data ['to_uid'];
		}
		 public function getTo_username(){
			return self::$_data ['to_username'];
		}
		 public function getMsg_status(){
			return self::$_data ['msg_status'];
		}
		 public function getView_status(){
			return self::$_data ['view_status'];
		}
		 public function getTitle(){
			return self::$_data ['title'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setMsg_id($value){
			return self::$_data ['msg_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setMsg_pid($value){
			return self::$_data ['msg_pid'] = $value;
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
		public function setTo_uid($value){
			return self::$_data ['to_uid'] = $value;
			$this;
		}
		public function setTo_username($value){
			return self::$_data ['to_username'] = $value;
			$this;
		}
		public function setMsg_status($value){
			return self::$_data ['msg_status'] = $value;
			$this;
		}
		public function setView_status($value){
			return self::$_data ['view_status'] = $value;
			$this;
		}
		public function setTitle($value){
			return self::$_data ['title'] = $value;
			$this;
		}
		public function setContent($value){
			return self::$_data ['content'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}