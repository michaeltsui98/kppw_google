<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_feed  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_feed' );
			self::$pk = 'fid';
		}
		 public function getFid(){
			return self::$_data ['fid'];
		}
		 public function getFtype(){
			return self::$_data ['ftype'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getSpace_url(){
			return self::$_data ['space_url'];
		}
		 public function getAction(){
			return self::$_data ['action'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getObj_title(){
			return self::$_data ['obj_title'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_cash(){
			return self::$_data ['obj_cash'];
		}
		 public function getFeed_time(){
			return self::$_data ['feed_time'];
		}
		public function setFid($value){
			return self::$_data ['fid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setFtype($value){
			return self::$_data ['ftype'] = $value;
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
		public function setSpace_url($value){
			return self::$_data ['space_url'] = $value;
			$this;
		}
		public function setAction($value){
			return self::$_data ['action'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setObj_title($value){
			return self::$_data ['obj_title'] = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setObj_cash($value){
			return self::$_data ['obj_cash'] = $value;
			$this;
		}
		public function setFeed_time($value){
			return self::$_data ['feed_time'] = $value;
			$this;
		}
}