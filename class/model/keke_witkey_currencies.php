<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_currencies  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_currencies' );
			self::$pk = 'currencies_id';
		}
		 public function getCurrencies_id(){
			return self::$_data ['currencies_id'];
		}
		 public function getTitle(){
			return self::$_data ['title'];
		}
		 public function getCode(){
			return self::$_data ['code'];
		}
		 public function getSymbol_left(){
			return self::$_data ['symbol_left'];
		}
		 public function getSymbol_right(){
			return self::$_data ['symbol_right'];
		}
		 public function getDecimal_point(){
			return self::$_data ['decimal_point'];
		}
		 public function getThousands_point(){
			return self::$_data ['thousands_point'];
		}
		 public function getDecimal_places(){
			return self::$_data ['decimal_places'];
		}
		 public function getValue(){
			return self::$_data ['value'];
		}
		 public function getLast_updated(){
			return self::$_data ['last_updated'];
		}
		public function setCurrencies_id($value){
			return self::$_data ['currencies_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTitle($value){
			return self::$_data ['title'] = $value;
			$this;
		}
		public function setCode($value){
			return self::$_data ['code'] = $value;
			$this;
		}
		public function setSymbol_left($value){
			return self::$_data ['symbol_left'] = $value;
			$this;
		}
		public function setSymbol_right($value){
			return self::$_data ['symbol_right'] = $value;
			$this;
		}
		public function setDecimal_point($value){
			return self::$_data ['decimal_point'] = $value;
			$this;
		}
		public function setThousands_point($value){
			return self::$_data ['thousands_point'] = $value;
			$this;
		}
		public function setDecimal_places($value){
			return self::$_data ['decimal_places'] = $value;
			$this;
		}
		public function setValue($value){
			return self::$_data ['value'] = $value;
			$this;
		}
		public function setLast_updated($value){
			return self::$_data ['last_updated'] = $value;
			$this;
		}
}