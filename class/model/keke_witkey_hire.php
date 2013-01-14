<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_hire  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_hire' );
			self::$pk = 'hire_id';
		}
		 public function getHire_id(){
			return self::$_data ['hire_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getEuid(){
			return self::$_data ['euid'];
		}
		 public function getEusername(){
			return self::$_data ['eusername'];
		}
		 public function getPrice(){
			return self::$_data ['price'];
		}
		 public function getTitle(){
			return self::$_data ['title'];
		}
		 public function getHire_status(){
			return self::$_data ['hire_status'];
		}
		 public function getOpen_step(){
			return self::$_data ['open_step'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getBuyer_status(){
			return self::$_data ['buyer_status'];
		}
		 public function getSeller_status(){
			return self::$_data ['seller_status'];
		}
		 public function getWish_time(){
			return self::$_data ['wish_time'];
		}
		 public function getDateline(){
			return self::$_data ['dateline'];
		}
		 public function getUnique_num(){
			return self::$_data ['unique_num'];
		}
		public function setHire_id($value){
			return self::$_data ['hire_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setEuid($value){
			return self::$_data ['euid'] = $value;
			$this;
		}
		public function setEusername($value){
			return self::$_data ['eusername'] = $value;
			$this;
		}
		public function setPrice($value){
			return self::$_data ['price'] = $value;
			$this;
		}
		public function setTitle($value){
			return self::$_data ['title'] = $value;
			$this;
		}
		public function setHire_status($value){
			return self::$_data ['hire_status'] = $value;
			$this;
		}
		public function setOpen_step($value){
			return self::$_data ['open_step'] = $value;
			$this;
		}
		public function setContent($value){
			return self::$_data ['content'] = $value;
			$this;
		}
		public function setBuyer_status($value){
			return self::$_data ['buyer_status'] = $value;
			$this;
		}
		public function setSeller_status($value){
			return self::$_data ['seller_status'] = $value;
			$this;
		}
		public function setWish_time($value){
			return self::$_data ['wish_time'] = $value;
			$this;
		}
		public function setDateline($value){
			return self::$_data ['dateline'] = $value;
			$this;
		}
		public function setUnique_num($value){
			return self::$_data ['unique_num'] = $value;
			$this;
		}
}