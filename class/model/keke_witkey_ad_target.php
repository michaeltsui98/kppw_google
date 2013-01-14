<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_ad_target  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_ad_target' );
			self::$pk = 'target_id';
		}
		 public function getTarget_id(){
			return self::$_data ['target_id'];
		}
		 public function getName(){
			return self::$_data ['name'];
		}
		 public function getDescription(){
			return self::$_data ['description'];
		}
		 public function getAd_size(){
			return self::$_data ['ad_size'];
		}
		 public function getAd_num(){
			return self::$_data ['ad_num'];
		}
		 public function getSample_pic(){
			return self::$_data ['sample_pic'];
		}
		 public function getIs_allow(){
			return self::$_data ['is_allow'];
		}
		 public function getTag_code(){
			return self::$_data ['tag_code'];
		}
		public function setTarget_id($value){
			return self::$_data ['target_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setName($value){
			return self::$_data ['name'] = $value;
			$this;
		}
		public function setDescription($value){
			return self::$_data ['description'] = $value;
			$this;
		}
		public function setAd_size($value){
			return self::$_data ['ad_size'] = $value;
			$this;
		}
		public function setAd_num($value){
			return self::$_data ['ad_num'] = $value;
			$this;
		}
		public function setSample_pic($value){
			return self::$_data ['sample_pic'] = $value;
			$this;
		}
		public function setIs_allow($value){
			return self::$_data ['is_allow'] = $value;
			$this;
		}
		public function setTag_code($value){
			return self::$_data ['tag_code'] = $value;
			$this;
		}
}