<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_payitem_record  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_payitem_record' );
			self::$pk = 'record_id';
		}
		 public function getRecord_id(){
			return self::$_data ['record_id'];
		}
		 public function getItem_code(){
			return self::$_data ['item_code'];
		}
		 public function getUse_type(){
			return self::$_data ['use_type'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getPobj_id(){
			return self::$_data ['pobj_id'];
		}
		 public function getUse_cash(){
			return self::$_data ['use_cash'];
		}
		 public function getUse_num(){
			return self::$_data ['use_num'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		public function setRecord_id($value){
			return self::$_data ['record_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setItem_code($value){
			return self::$_data ['item_code'] = $value;
			$this;
		}
		public function setUse_type($value){
			return self::$_data ['use_type'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setPobj_id($value){
			return self::$_data ['pobj_id'] = $value;
			$this;
		}
		public function setUse_cash($value){
			return self::$_data ['use_cash'] = $value;
			$this;
		}
		public function setUse_num($value){
			return self::$_data ['use_num'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
}