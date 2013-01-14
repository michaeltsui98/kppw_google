<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_field  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_field' );
			self::$pk = 'field_id';
		}
		 public function getField_id(){
			return self::$_data ['field_id'];
		}
		 public function getField_type(){
			return self::$_data ['field_type'];
		}
		 public function getField_name(){
			return self::$_data ['field_name'];
		}
		 public function getField_items(){
			return self::$_data ['field_items'];
		}
		 public function getField_table(){
			return self::$_data ['field_table'];
		}
		 public function getField_description(){
			return self::$_data ['field_description'];
		}
		 public function getValid(){
			return self::$_data ['valid'];
		}
		 public function getValid_require(){
			return self::$_data ['valid_require'];
		}
		 public function getValid_min(){
			return self::$_data ['valid_min'];
		}
		 public function getValid_max(){
			return self::$_data ['valid_max'];
		}
		 public function getValid_type(){
			return self::$_data ['valid_type'];
		}
		 public function getField_errordesc(){
			return self::$_data ['field_errordesc'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getDateline(){
			return self::$_data ['dateline'];
		}
		public function setField_id($value){
			return self::$_data ['field_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setField_type($value){
			return self::$_data ['field_type'] = $value;
			$this;
		}
		public function setField_name($value){
			return self::$_data ['field_name'] = $value;
			$this;
		}
		public function setField_items($value){
			return self::$_data ['field_items'] = $value;
			$this;
		}
		public function setField_table($value){
			return self::$_data ['field_table'] = $value;
			$this;
		}
		public function setField_description($value){
			return self::$_data ['field_description'] = $value;
			$this;
		}
		public function setValid($value){
			return self::$_data ['valid'] = $value;
			$this;
		}
		public function setValid_require($value){
			return self::$_data ['valid_require'] = $value;
			$this;
		}
		public function setValid_min($value){
			return self::$_data ['valid_min'] = $value;
			$this;
		}
		public function setValid_max($value){
			return self::$_data ['valid_max'] = $value;
			$this;
		}
		public function setValid_type($value){
			return self::$_data ['valid_type'] = $value;
			$this;
		}
		public function setField_errordesc($value){
			return self::$_data ['field_errordesc'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setDateline($value){
			return self::$_data ['dateline'] = $value;
			$this;
		}
}