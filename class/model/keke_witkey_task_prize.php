<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_prize  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_prize' );
			self::$pk = 'prize_id';
		}
		 public function getPrize_id(){
			return self::$_data ['prize_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getPrize(){
			return self::$_data ['prize'];
		}
		 public function getPrize_count(){
			return self::$_data ['prize_count'];
		}
		 public function getPrize_cash(){
			return self::$_data ['prize_cash'];
		}
		public function setPrize_id($value){
			return self::$_data ['prize_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setPrize($value){
			return self::$_data ['prize'] = $value;
			$this;
		}
		public function setPrize_count($value){
			return self::$_data ['prize_count'] = $value;
			$this;
		}
		public function setPrize_cash($value){
			return self::$_data ['prize_cash'] = $value;
			$this;
		}
}