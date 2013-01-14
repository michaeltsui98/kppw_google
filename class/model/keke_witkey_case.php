<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_case  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_case' );
			self::$pk = 'case_id';
		}
		 public function getCase_id(){
			return self::$_data ['case_id'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getCase_img(){
			return self::$_data ['case_img'];
		}
		 public function getCase_title(){
			return self::$_data ['case_title'];
		}
		 public function getCase_desc(){
			return self::$_data ['case_desc'];
		}
		 public function getCase_price(){
			return self::$_data ['case_price'];
		}
		 public function getCase_auther(){
			return self::$_data ['case_auther'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setCase_id($value){
			return self::$_data ['case_id'] = $value;
			self::$pk_val = $value;
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
		public function setCase_img($value){
			return self::$_data ['case_img'] = $value;
			$this;
		}
		public function setCase_title($value){
			return self::$_data ['case_title'] = $value;
			$this;
		}
		public function setCase_desc($value){
			return self::$_data ['case_desc'] = $value;
			$this;
		}
		public function setCase_price($value){
			return self::$_data ['case_price'] = $value;
			$this;
		}
		public function setCase_auther($value){
			return self::$_data ['case_auther'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}