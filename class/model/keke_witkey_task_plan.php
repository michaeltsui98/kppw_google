<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_plan  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_plan' );
			self::$pk = 'plan_id';
		}
		 public function getPlan_id(){
			return self::$_data ['plan_id'];
		}
		 public function getBid_id(){
			return self::$_data ['bid_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getPlan_title(){
			return self::$_data ['plan_title'];
		}
		 public function getPlan_desc(){
			return self::$_data ['plan_desc'];
		}
		 public function getPlan_step(){
			return self::$_data ['plan_step'];
		}
		 public function getPlan_amount(){
			return self::$_data ['plan_amount'];
		}
		 public function getPlan_status(){
			return self::$_data ['plan_status'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getOver_time(){
			return self::$_data ['over_time'];
		}
		public function setPlan_id($value){
			return self::$_data ['plan_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setBid_id($value){
			return self::$_data ['bid_id'] = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setPlan_title($value){
			return self::$_data ['plan_title'] = $value;
			$this;
		}
		public function setPlan_desc($value){
			return self::$_data ['plan_desc'] = $value;
			$this;
		}
		public function setPlan_step($value){
			return self::$_data ['plan_step'] = $value;
			$this;
		}
		public function setPlan_amount($value){
			return self::$_data ['plan_amount'] = $value;
			$this;
		}
		public function setPlan_status($value){
			return self::$_data ['plan_status'] = $value;
			$this;
		}
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setOver_time($value){
			return self::$_data ['over_time'] = $value;
			$this;
		}
}