<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_auth_item  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_auth_item' );
			self::$pk = 'auth_code';
		}
		 public function getAuth_code(){
			return self::$_data ['auth_code'];
		}
		 public function getAuth_title(){
			return self::$_data ['auth_title'];
		}
		 public function getAuth_day(){
			return self::$_data ['auth_day'];
		}
		 public function getAuth_small_ico(){
			return self::$_data ['auth_small_ico'];
		}
		 public function getAuth_small_n_ico(){
			return self::$_data ['auth_small_n_ico'];
		}
		 public function getAuth_big_ico(){
			return self::$_data ['auth_big_ico'];
		}
		 public function getAuth_desc(){
			return self::$_data ['auth_desc'];
		}
		 public function getAuth_cash(){
			return self::$_data ['auth_cash'];
		}
		 public function getAuth_expir(){
			return self::$_data ['auth_expir'];
		}
		 public function getAuth_open(){
			return self::$_data ['auth_open'];
		}
		 public function getAuth_show(){
			return self::$_data ['auth_show'];
		}
		 public function getMuti_auth(){
			return self::$_data ['muti_auth'];
		}
		 public function getUpdate_time(){
			return self::$_data ['update_time'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getConfig(){
			return self::$_data ['config'];
		}
		public function setAuth_code($value){
			return self::$_data ['auth_code'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setAuth_title($value){
			return self::$_data ['auth_title'] = $value;
			$this;
		}
		public function setAuth_day($value){
			return self::$_data ['auth_day'] = $value;
			$this;
		}
		public function setAuth_small_ico($value){
			return self::$_data ['auth_small_ico'] = $value;
			$this;
		}
		public function setAuth_small_n_ico($value){
			return self::$_data ['auth_small_n_ico'] = $value;
			$this;
		}
		public function setAuth_big_ico($value){
			return self::$_data ['auth_big_ico'] = $value;
			$this;
		}
		public function setAuth_desc($value){
			return self::$_data ['auth_desc'] = $value;
			$this;
		}
		public function setAuth_cash($value){
			return self::$_data ['auth_cash'] = $value;
			$this;
		}
		public function setAuth_expir($value){
			return self::$_data ['auth_expir'] = $value;
			$this;
		}
		public function setAuth_open($value){
			return self::$_data ['auth_open'] = $value;
			$this;
		}
		public function setAuth_show($value){
			return self::$_data ['auth_show'] = $value;
			$this;
		}
		public function setMuti_auth($value){
			return self::$_data ['muti_auth'] = $value;
			$this;
		}
		public function setUpdate_time($value){
			return self::$_data ['update_time'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setConfig($value){
			return self::$_data ['config'] = $value;
			$this;
		}
}