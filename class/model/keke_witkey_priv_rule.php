<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_priv_rule  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_priv_rule' );
			self::$pk = 'r_id';
		}
		 public function getR_id(){
			return self::$_data ['r_id'];
		}
		 public function getItem_id(){
			return self::$_data ['item_id'];
		}
		 public function getMark_rule_id(){
			return self::$_data ['mark_rule_id'];
		}
		 public function getRule(){
			return self::$_data ['rule'];
		}
		public function setR_id($value){
			return self::$_data ['r_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setItem_id($value){
			return self::$_data ['item_id'] = $value;
			$this;
		}
		public function setMark_rule_id($value){
			return self::$_data ['mark_rule_id'] = $value;
			$this;
		}
		public function setRule($value){
			return self::$_data ['rule'] = $value;
			$this;
		}
}