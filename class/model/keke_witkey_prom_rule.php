<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_prom_rule  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_prom_rule' );
			self::$pk = 'prom_id';
		}
		 public function getProm_id(){
			return self::$_data ['prom_id'];
		}
		 public function getProm_item(){
			return self::$_data ['prom_item'];
		}
		 public function getProm_code(){
			return self::$_data ['prom_code'];
		}
		 public function getMonth(){
			return self::$_data ['month'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getCredit(){
			return self::$_data ['credit'];
		}
		 public function getRate(){
			return self::$_data ['rate'];
		}
		 public function getConfig(){
			return self::$_data ['config'];
		}
		 public function getIs_open(){
			return self::$_data ['is_open'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		public function setProm_id($value){
			return self::$_data ['prom_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setProm_item($value){
			return self::$_data ['prom_item'] = $value;
			$this;
		}
		public function setProm_code($value){
			return self::$_data ['prom_code'] = $value;
			$this;
		}
		public function setMonth($value){
			return self::$_data ['month'] = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
			$this;
		}
		public function setCredit($value){
			return self::$_data ['credit'] = $value;
			$this;
		}
		public function setRate($value){
			return self::$_data ['rate'] = $value;
			$this;
		}
		public function setConfig($value){
			return self::$_data ['config'] = $value;
			$this;
		}
		public function setIs_open($value){
			return self::$_data ['is_open'] = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
}