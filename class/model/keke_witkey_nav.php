<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_nav  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_nav' );
			self::$pk = 'nav_id';
		}
		 public function getNav_id(){
			return self::$_data ['nav_id'];
		}
		 public function getNav_url(){
			return self::$_data ['nav_url'];
		}
		 public function getNav_title(){
			return self::$_data ['nav_title'];
		}
		 public function getNav_style(){
			return self::$_data ['nav_style'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getNewwindow(){
			return self::$_data ['newwindow'];
		}
		 public function getIshide(){
			return self::$_data ['ishide'];
		}
		public function setNav_id($value){
			return self::$_data ['nav_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setNav_url($value){
			return self::$_data ['nav_url'] = $value;
			$this;
		}
		public function setNav_title($value){
			return self::$_data ['nav_title'] = $value;
			$this;
		}
		public function setNav_style($value){
			return self::$_data ['nav_style'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setNewwindow($value){
			return self::$_data ['newwindow'] = $value;
			$this;
		}
		public function setIshide($value){
			return self::$_data ['ishide'] = $value;
			$this;
		}
}