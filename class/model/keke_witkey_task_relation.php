<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_relation  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_relation' );
			self::$pk = 'relation_id';
		}
		 public function getRelation_id(){
			return self::$_data ['relation_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getR_task_id(){
			return self::$_data ['r_task_id'];
		}
		 public function getApp_id(){
			return self::$_data ['app_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		public function setRelation_id($value){
			return self::$_data ['relation_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setR_task_id($value){
			return self::$_data ['r_task_id'] = $value;
			$this;
		}
		public function setApp_id($value){
			return self::$_data ['app_id'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
}