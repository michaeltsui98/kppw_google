<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_file  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_file' );
			self::$pk = 'file_id';
		}
		 public function getFile_id(){
			return self::$_data ['file_id'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getPid(){
			return self::$_data ['pid'];
		}
		 public function getFile_name(){
			return self::$_data ['file_name'];
		}
		 public function getSave_name(){
			return self::$_data ['save_name'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setFile_id($value){
			return self::$_data ['file_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setPid($value){
			return self::$_data ['pid'] = $value;
			$this;
		}
		public function setFile_name($value){
			return self::$_data ['file_name'] = $value;
			$this;
		}
		public function setSave_name($value){
			return self::$_data ['save_name'] = $value;
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
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}