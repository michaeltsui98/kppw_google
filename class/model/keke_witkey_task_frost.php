<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_frost  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_frost' );
			self::$pk = 'frost_id';
		}
		 public function getFrost_id(){
			return self::$_data ['frost_id'];
		}
		 public function getFrost_status(){
			return self::$_data ['frost_status'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getFrost_time(){
			return self::$_data ['frost_time'];
		}
		 public function getRestore_time(){
			return self::$_data ['restore_time'];
		}
		 public function getAdmin_uid(){
			return self::$_data ['admin_uid'];
		}
		 public function getAdmin_username(){
			return self::$_data ['admin_username'];
		}
		public function setFrost_id($value){
			return self::$_data ['frost_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setFrost_status($value){
			return self::$_data ['frost_status'] = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setFrost_time($value){
			return self::$_data ['frost_time'] = $value;
			$this;
		}
		public function setRestore_time($value){
			return self::$_data ['restore_time'] = $value;
			$this;
		}
		public function setAdmin_uid($value){
			return self::$_data ['admin_uid'] = $value;
			$this;
		}
		public function setAdmin_username($value){
			return self::$_data ['admin_username'] = $value;
			$this;
		}
}