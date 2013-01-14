<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_cash_cove  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_cash_cove' );
			self::$pk = 'cash_rule_id';
		}
		 public function getCash_rule_id(){
			return self::$_data ['cash_rule_id'];
		}
		 public function getStart_cove(){
			return self::$_data ['start_cove'];
		}
		 public function getEnd_cove(){
			return self::$_data ['end_cove'];
		}
		 public function getCove_desc(){
			return self::$_data ['cove_desc'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		public function setCash_rule_id($value){
			return self::$_data ['cash_rule_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setStart_cove($value){
			return self::$_data ['start_cove'] = $value;
			$this;
		}
		public function setEnd_cove($value){
			return self::$_data ['end_cove'] = $value;
			$this;
		}
		public function setCove_desc($value){
			return self::$_data ['cove_desc'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
}