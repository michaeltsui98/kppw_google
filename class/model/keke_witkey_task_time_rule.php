<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_time_rule  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_time_rule' );
			self::$pk = 'day_rule_id';
		}
		 public function getDay_rule_id(){
			return self::$_data ['day_rule_id'];
		}
		 public function getRule_cash(){
			return self::$_data ['rule_cash'];
		}
		 public function getRule_day(){
			return self::$_data ['rule_day'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		public function setDay_rule_id($value){
			return self::$_data ['day_rule_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setRule_cash($value){
			return self::$_data ['rule_cash'] = $value;
			$this;
		}
		public function setRule_day($value){
			return self::$_data ['rule_day'] = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
}