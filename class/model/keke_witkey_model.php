<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_model  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_model' );
			self::$pk = 'model_id';
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		 public function getModel_name(){
			return self::$_data ['model_name'];
		}
		 public function getModel_type(){
			return self::$_data ['model_type'];
		}
		 public function getModel_dev(){
			return self::$_data ['model_dev'];
		}
		 public function getModel_status(){
			return self::$_data ['model_status'];
		}
		 public function getModel_desc(){
			return self::$_data ['model_desc'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getHide_mode(){
			return self::$_data ['hide_mode'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getIndus_bid(){
			return self::$_data ['indus_bid'];
		}
		 public function getConfig(){
			return self::$_data ['config'];
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
		public function setModel_name($value){
			return self::$_data ['model_name'] = $value;
			$this;
		}
		public function setModel_type($value){
			return self::$_data ['model_type'] = $value;
			$this;
		}
		public function setModel_dev($value){
			return self::$_data ['model_dev'] = $value;
			$this;
		}
		public function setModel_status($value){
			return self::$_data ['model_status'] = $value;
			$this;
		}
		public function setModel_desc($value){
			return self::$_data ['model_desc'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setHide_mode($value){
			return self::$_data ['hide_mode'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setIndus_bid($value){
			return self::$_data ['indus_bid'] = $value;
			$this;
		}
		public function setConfig($value){
			return self::$_data ['config'] = $value;
			$this;
		}
}