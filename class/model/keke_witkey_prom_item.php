<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_prom_item  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_prom_item' );
			self::$pk = 'item_id';
		}
		 public function getItem_id(){
			return self::$_data ['item_id'];
		}
		 public function getItem_type(){
			return self::$_data ['item_type'];
		}
		 public function getProm_type(){
			return self::$_data ['prom_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getItem_name(){
			return self::$_data ['item_name'];
		}
		 public function getItem_pic(){
			return self::$_data ['item_pic'];
		}
		 public function getItem_content(){
			return self::$_data ['item_content'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setItem_id($value){
			return self::$_data ['item_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setItem_type($value){
			return self::$_data ['item_type'] = $value;
			$this;
		}
		public function setProm_type($value){
			return self::$_data ['prom_type'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setItem_name($value){
			return self::$_data ['item_name'] = $value;
			$this;
		}
		public function setItem_pic($value){
			return self::$_data ['item_pic'] = $value;
			$this;
		}
		public function setItem_content($value){
			return self::$_data ['item_content'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}