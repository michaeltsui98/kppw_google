<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_mark_rule  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_mark_rule' );
			self::$pk = 'mark_rule_id';
		}
		 public function getMark_rule_id(){
			return self::$_data ['mark_rule_id'];
		}
		 public function getBuyer_value(){
			return self::$_data ['buyer_value'];
		}
		 public function getSeller_value(){
			return self::$_data ['seller_value'];
		}
		 public function getG_title(){
			return self::$_data ['g_title'];
		}
		 public function getM_title(){
			return self::$_data ['m_title'];
		}
		 public function getG_ico(){
			return self::$_data ['g_ico'];
		}
		 public function getM_ico(){
			return self::$_data ['m_ico'];
		}
		public function setMark_rule_id($value){
			return self::$_data ['mark_rule_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setBuyer_value($value){
			return self::$_data ['buyer_value'] = $value;
			$this;
		}
		public function setSeller_value($value){
			return self::$_data ['seller_value'] = $value;
			$this;
		}
		public function setG_title($value){
			return self::$_data ['g_title'] = $value;
			$this;
		}
		public function setM_title($value){
			return self::$_data ['m_title'] = $value;
			$this;
		}
		public function setG_ico($value){
			return self::$_data ['g_ico'] = $value;
			$this;
		}
		public function setM_ico($value){
			return self::$_data ['m_ico'] = $value;
			$this;
		}
}