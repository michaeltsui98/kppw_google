<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_shop_member  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_shop_member' );
			self::$pk = 'member_id';
		}
		 public function getMember_id(){
			return self::$_data ['member_id'];
		}
		 public function getShop_id(){
			return self::$_data ['shop_id'];
		}
		 public function getTruename(){
			return self::$_data ['truename'];
		}
		 public function getMember_pic(){
			return self::$_data ['member_pic'];
		}
		 public function getMember_job(){
			return self::$_data ['member_job'];
		}
		 public function getEntry_age(){
			return self::$_data ['entry_age'];
		}
		 public function getTop_eduction(){
			return self::$_data ['top_eduction'];
		}
		 public function getSchool(){
			return self::$_data ['school'];
		}
		 public function getMember_desc(){
			return self::$_data ['member_desc'];
		}
		public function setMember_id($value){
			return self::$_data ['member_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setShop_id($value){
			return self::$_data ['shop_id'] = $value;
			$this;
		}
		public function setTruename($value){
			return self::$_data ['truename'] = $value;
			$this;
		}
		public function setMember_pic($value){
			return self::$_data ['member_pic'] = $value;
			$this;
		}
		public function setMember_job($value){
			return self::$_data ['member_job'] = $value;
			$this;
		}
		public function setEntry_age($value){
			return self::$_data ['entry_age'] = $value;
			$this;
		}
		public function setTop_eduction($value){
			return self::$_data ['top_eduction'] = $value;
			$this;
		}
		public function setSchool($value){
			return self::$_data ['school'] = $value;
			$this;
		}
		public function setMember_desc($value){
			return self::$_data ['member_desc'] = $value;
			$this;
		}
}