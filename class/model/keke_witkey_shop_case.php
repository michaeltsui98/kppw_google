<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_shop_case  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_shop_case' );
			self::$pk = 'case_id';
		}
		 public function getCase_id(){
			return self::$_data ['case_id'];
		}
		 public function getCate_id(){
			return self::$_data ['cate_id'];
		}
		 public function getShop_id(){
			return self::$_data ['shop_id'];
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getCase_type(){
			return self::$_data ['case_type'];
		}
		 public function getService_id(){
			return self::$_data ['service_id'];
		}
		 public function getCase_name(){
			return self::$_data ['case_name'];
		}
		 public function getCase_desc(){
			return self::$_data ['case_desc'];
		}
		 public function getCase_pic(){
			return self::$_data ['case_pic'];
		}
		 public function getCase_url(){
			return self::$_data ['case_url'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setCase_id($value){
			return self::$_data ['case_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setCate_id($value){
			return self::$_data ['cate_id'] = $value;
			$this;
		}
		public function setShop_id($value){
			return self::$_data ['shop_id'] = $value;
			$this;
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			$this;
		}
		public function setCase_type($value){
			return self::$_data ['case_type'] = $value;
			$this;
		}
		public function setService_id($value){
			return self::$_data ['service_id'] = $value;
			$this;
		}
		public function setCase_name($value){
			return self::$_data ['case_name'] = $value;
			$this;
		}
		public function setCase_desc($value){
			return self::$_data ['case_desc'] = $value;
			$this;
		}
		public function setCase_pic($value){
			return self::$_data ['case_pic'] = $value;
			$this;
		}
		public function setCase_url($value){
			return self::$_data ['case_url'] = $value;
			$this;
		}
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}