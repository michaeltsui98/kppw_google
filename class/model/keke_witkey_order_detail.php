<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_order_detail  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_order_detail' );
			self::$pk = 'detail_id';
		}
		 public function getDetail_id(){
			return self::$_data ['detail_id'];
		}
		 public function getName(){
			return self::$_data ['name'];
		}
		 public function getOrder_id(){
			return self::$_data ['order_id'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getPrice(){
			return self::$_data ['price'];
		}
		 public function getNum(){
			return self::$_data ['num'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		public function setDetail_id($value){
			return self::$_data ['detail_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setName($value){
			return self::$_data ['name'] = $value;
			$this;
		}
		public function setOrder_id($value){
			return self::$_data ['order_id'] = $value;
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
		public function setPrice($value){
			return self::$_data ['price'] = $value;
			$this;
		}
		public function setNum($value){
			return self::$_data ['num'] = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
}