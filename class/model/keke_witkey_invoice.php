<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_invoice  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_invoice' );
			self::$pk = 'fpid';
		}
		 public function getFpid(){
			return self::$_data ['fpid'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getFp_title(){
			return self::$_data ['fp_title'];
		}
		 public function getFp_linxiren(){
			return self::$_data ['fp_linxiren'];
		}
		 public function getFp_zip(){
			return self::$_data ['fp_zip'];
		}
		 public function getFp_address(){
			return self::$_data ['fp_address'];
		}
		 public function getFp_mobile(){
			return self::$_data ['fp_mobile'];
		}
		 public function getFp_use(){
			return self::$_data ['fp_use'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		public function setFpid($value){
			return self::$_data ['fpid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setFp_title($value){
			return self::$_data ['fp_title'] = $value;
			$this;
		}
		public function setFp_linxiren($value){
			return self::$_data ['fp_linxiren'] = $value;
			$this;
		}
		public function setFp_zip($value){
			return self::$_data ['fp_zip'] = $value;
			$this;
		}
		public function setFp_address($value){
			return self::$_data ['fp_address'] = $value;
			$this;
		}
		public function setFp_mobile($value){
			return self::$_data ['fp_mobile'] = $value;
			$this;
		}
		public function setFp_use($value){
			return self::$_data ['fp_use'] = $value;
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
}