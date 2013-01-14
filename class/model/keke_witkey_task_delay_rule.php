<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_delay_rule  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_delay_rule' );
			self::$pk = 'defer_rule_id';
		}
		 public function getDefer_rule_id(){
			return self::$_data ['defer_rule_id'];
		}
		 public function getDefer_times(){
			return self::$_data ['defer_times'];
		}
		 public function getDefer_rate(){
			return self::$_data ['defer_rate'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		public function setDefer_rule_id($value){
			return self::$_data ['defer_rule_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setDefer_times($value){
			return self::$_data ['defer_times'] = $value;
			$this;
		}
		public function setDefer_rate($value){
			return self::$_data ['defer_rate'] = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
}