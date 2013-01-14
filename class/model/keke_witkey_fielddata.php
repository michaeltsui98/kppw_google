<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_fielddata  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_fielddata' );
			self::$pk = 'data_id';
		}
		 public function getData_id(){
			return self::$_data ['data_id'];
		}
		 public function getField_id(){
			return self::$_data ['field_id'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getData_value(){
			return self::$_data ['data_value'];
		}
		public function setData_id($value){
			return self::$_data ['data_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setField_id($value){
			return self::$_data ['field_id'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setData_value($value){
			return self::$_data ['data_value'] = $value;
			$this;
		}
}