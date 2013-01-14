<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_temp  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_temp' );
			self::$pk = 'id';
		}
		 public function getId(){
			return self::$_data ['id'];
		}
		 public function getTask_title(){
			return self::$_data ['task_title'];
		}
		 public function getTask_cash(){
			return self::$_data ['task_cash'];
		}
		 public function getTask_desc(){
			return self::$_data ['task_desc'];
		}
		 public function getTask_file(){
			return self::$_data ['task_file'];
		}
		 public function getTask_contact(){
			return self::$_data ['task_contact'];
		}
		 public function getTask_pay_item(){
			return self::$_data ['task_pay_item'];
		}
		 public function getTask_indus(){
			return self::$_data ['task_indus'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		 public function getSub_time(){
			return self::$_data ['sub_time'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getFp_title(){
			return self::$_data ['fp_title'];
		}
		 public function getFp_linxiren(){
			return self::$_data ['fp_linxiren'];
		}
		 public function getFp_address(){
			return self::$_data ['fp_address'];
		}
		 public function getFp_zip(){
			return self::$_data ['fp_zip'];
		}
		 public function getFp_mobile(){
			return self::$_data ['fp_mobile'];
		}
		 public function getFp_use(){
			return self::$_data ['fp_use'];
		}
		public function setId($value){
			return self::$_data ['id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_title($value){
			return self::$_data ['task_title'] = $value;
			$this;
		}
		public function setTask_cash($value){
			return self::$_data ['task_cash'] = $value;
			$this;
		}
		public function setTask_desc($value){
			return self::$_data ['task_desc'] = $value;
			$this;
		}
		public function setTask_file($value){
			return self::$_data ['task_file'] = $value;
			$this;
		}
		public function setTask_contact($value){
			return self::$_data ['task_contact'] = $value;
			$this;
		}
		public function setTask_pay_item($value){
			return self::$_data ['task_pay_item'] = $value;
			$this;
		}
		public function setTask_indus($value){
			return self::$_data ['task_indus'] = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
		public function setSub_time($value){
			return self::$_data ['sub_time'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
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
		public function setFp_address($value){
			return self::$_data ['fp_address'] = $value;
			$this;
		}
		public function setFp_zip($value){
			return self::$_data ['fp_zip'] = $value;
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
}