<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_match  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_match' );
			self::$pk = 'mt_id';
		}
		 public function getMt_id(){
			return self::$_data ['mt_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getHirer_deposit(){
			return self::$_data ['hirer_deposit'];
		}
		 public function getDeposit_cash(){
			return self::$_data ['deposit_cash'];
		}
		 public function getDeposit_credit(){
			return self::$_data ['deposit_credit'];
		}
		 public function getHost_amount(){
			return self::$_data ['host_amount'];
		}
		 public function getHost_cash(){
			return self::$_data ['host_cash'];
		}
		 public function getHost_credit(){
			return self::$_data ['host_credit'];
		}
		 public function getDeposit_rate(){
			return self::$_data ['deposit_rate'];
		}
		public function setMt_id($value){
			return self::$_data ['mt_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setHirer_deposit($value){
			return self::$_data ['hirer_deposit'] = $value;
			$this;
		}
		public function setDeposit_cash($value){
			return self::$_data ['deposit_cash'] = $value;
			$this;
		}
		public function setDeposit_credit($value){
			return self::$_data ['deposit_credit'] = $value;
			$this;
		}
		public function setHost_amount($value){
			return self::$_data ['host_amount'] = $value;
			$this;
		}
		public function setHost_cash($value){
			return self::$_data ['host_cash'] = $value;
			$this;
		}
		public function setHost_credit($value){
			return self::$_data ['host_credit'] = $value;
			$this;
		}
		public function setDeposit_rate($value){
			return self::$_data ['deposit_rate'] = $value;
			$this;
		}
}