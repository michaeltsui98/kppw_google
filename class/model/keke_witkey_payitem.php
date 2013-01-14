<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_payitem  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_payitem' );
			self::$pk = 'item_id';
		}
		 public function getItem_id(){
			return self::$_data ['item_id'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		 public function getItem_code(){
			return self::$_data ['item_code'];
		}
		 public function getSmall_pic(){
			return self::$_data ['small_pic'];
		}
		 public function getBig_pic(){
			return self::$_data ['big_pic'];
		}
		 public function getItem_name(){
			return self::$_data ['item_name'];
		}
		 public function getUser_type(){
			return self::$_data ['user_type'];
		}
		 public function getItem_cash(){
			return self::$_data ['item_cash'];
		}
		 public function getItem_standard(){
			return self::$_data ['item_standard'];
		}
		 public function getItem_limit(){
			return self::$_data ['item_limit'];
		}
		 public function getItem_desc(){
			return self::$_data ['item_desc'];
		}
		 public function getExt(){
			return self::$_data ['ext'];
		}
		 public function getIs_open(){
			return self::$_data ['is_open'];
		}
		 public function getItem_type(){
			return self::$_data ['item_type'];
		}
		public function setItem_id($value){
			return self::$_data ['item_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
		public function setItem_code($value){
			return self::$_data ['item_code'] = $value;
			$this;
		}
		public function setSmall_pic($value){
			return self::$_data ['small_pic'] = $value;
			$this;
		}
		public function setBig_pic($value){
			return self::$_data ['big_pic'] = $value;
			$this;
		}
		public function setItem_name($value){
			return self::$_data ['item_name'] = $value;
			$this;
		}
		public function setUser_type($value){
			return self::$_data ['user_type'] = $value;
			$this;
		}
		public function setItem_cash($value){
			return self::$_data ['item_cash'] = $value;
			$this;
		}
		public function setItem_standard($value){
			return self::$_data ['item_standard'] = $value;
			$this;
		}
		public function setItem_limit($value){
			return self::$_data ['item_limit'] = $value;
			$this;
		}
		public function setItem_desc($value){
			return self::$_data ['item_desc'] = $value;
			$this;
		}
		public function setExt($value){
			return self::$_data ['ext'] = $value;
			$this;
		}
		public function setIs_open($value){
			return self::$_data ['is_open'] = $value;
			$this;
		}
		public function setItem_type($value){
			return self::$_data ['item_type'] = $value;
			$this;
		}
}