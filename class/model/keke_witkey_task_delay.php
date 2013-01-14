<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_delay  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_delay' );
			self::$pk = 'delay_id';
		}
		 public function getDelay_id(){
			return self::$_data ['delay_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getDelay_cash(){
			return self::$_data ['delay_cash'];
		}
		 public function getDelay_day(){
			return self::$_data ['delay_day'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getDelay_status(){
			return self::$_data ['delay_status'];
		}
		public function setDelay_id($value){
			return self::$_data ['delay_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setDelay_cash($value){
			return self::$_data ['delay_cash'] = $value;
			$this;
		}
		public function setDelay_day($value){
			return self::$_data ['delay_day'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setDelay_status($value){
			return self::$_data ['delay_status'] = $value;
			$this;
		}
}