<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_priv_item  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_priv_item' );
			self::$pk = 'op_id';
		}
		 public function getOp_id(){
			return self::$_data ['op_id'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		 public function getOp_code(){
			return self::$_data ['op_code'];
		}
		 public function getOp_name(){
			return self::$_data ['op_name'];
		}
		 public function getAllow_times(){
			return self::$_data ['allow_times'];
		}
		 public function getLimit_obj(){
			return self::$_data ['limit_obj'];
		}
		 public function getCondit(){
			return self::$_data ['condit'];
		}
		public function setOp_id($value){
			return self::$_data ['op_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
		public function setOp_code($value){
			return self::$_data ['op_code'] = $value;
			$this;
		}
		public function setOp_name($value){
			return self::$_data ['op_name'] = $value;
			$this;
		}
		public function setAllow_times($value){
			return self::$_data ['allow_times'] = $value;
			$this;
		}
		public function setLimit_obj($value){
			return self::$_data ['limit_obj'] = $value;
			$this;
		}
		public function setCondit($value){
			return self::$_data ['condit'] = $value;
			$this;
		}
}