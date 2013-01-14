<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_agreement  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_agreement' );
			self::$pk = 'agree_id';
		}
		 public function getAgree_id(){
			return self::$_data ['agree_id'];
		}
		 public function getAgree_status(){
			return self::$_data ['agree_status'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
		}
		 public function getBuyer_uid(){
			return self::$_data ['buyer_uid'];
		}
		 public function getBuyer_status(){
			return self::$_data ['buyer_status'];
		}
		 public function getBuyer_accepttime(){
			return self::$_data ['buyer_accepttime'];
		}
		 public function getBuyer_confirmtime(){
			return self::$_data ['buyer_confirmtime'];
		}
		 public function getSeller_uid(){
			return self::$_data ['seller_uid'];
		}
		 public function getSeller_status(){
			return self::$_data ['seller_status'];
		}
		 public function getSeller_accepttime(){
			return self::$_data ['seller_accepttime'];
		}
		 public function getSeller_confirmtime(){
			return self::$_data ['seller_confirmtime'];
		}
		 public function getAgree_title(){
			return self::$_data ['agree_title'];
		}
		 public function getFile_ids(){
			return self::$_data ['file_ids'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setAgree_id($value){
			return self::$_data ['agree_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setAgree_status($value){
			return self::$_data ['agree_status'] = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setWork_id($value){
			return self::$_data ['work_id'] = $value;
			$this;
		}
		public function setBuyer_uid($value){
			return self::$_data ['buyer_uid'] = $value;
			$this;
		}
		public function setBuyer_status($value){
			return self::$_data ['buyer_status'] = $value;
			$this;
		}
		public function setBuyer_accepttime($value){
			return self::$_data ['buyer_accepttime'] = $value;
			$this;
		}
		public function setBuyer_confirmtime($value){
			return self::$_data ['buyer_confirmtime'] = $value;
			$this;
		}
		public function setSeller_uid($value){
			return self::$_data ['seller_uid'] = $value;
			$this;
		}
		public function setSeller_status($value){
			return self::$_data ['seller_status'] = $value;
			$this;
		}
		public function setSeller_accepttime($value){
			return self::$_data ['seller_accepttime'] = $value;
			$this;
		}
		public function setSeller_confirmtime($value){
			return self::$_data ['seller_confirmtime'] = $value;
			$this;
		}
		public function setAgree_title($value){
			return self::$_data ['agree_title'] = $value;
			$this;
		}
		public function setFile_ids($value){
			return self::$_data ['file_ids'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}