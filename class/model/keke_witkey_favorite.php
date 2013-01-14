<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_favorite  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_favorite' );
			self::$pk = 'fid';
		}
		 public function getFid(){
			return self::$_data ['fid'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getOrigin_id(){
			return self::$_data ['origin_id'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getOn_date(){
			return self::$_data ['on_date'];
		}
		public function setFid($value){
			return self::$_data ['fid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setOrigin_id($value){
			return self::$_data ['origin_id'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
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
		public function setOn_date($value){
			return self::$_data ['on_date'] = $value;
			$this;
		}
}