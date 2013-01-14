<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_ad  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_ad' );
			self::$pk = 'ad_id';
		}
		 public function getAd_id(){
			return self::$_data ['ad_id'];
		}
		 public function getTarget_id(){
			return self::$_data ['target_id'];
		}
		 public function getAd_type(){
			return self::$_data ['ad_type'];
		}
		 public function getAd_name(){
			return self::$_data ['ad_name'];
		}
		 public function getAd_file(){
			return self::$_data ['ad_file'];
		}
		 public function getAd_content(){
			return self::$_data ['ad_content'];
		}
		 public function getAd_url(){
			return self::$_data ['ad_url'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getWidth(){
			return self::$_data ['width'];
		}
		 public function getHeight(){
			return self::$_data ['height'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setAd_id($value){
			return self::$_data ['ad_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTarget_id($value){
			return self::$_data ['target_id'] = $value;
			$this;
		}
		public function setAd_type($value){
			return self::$_data ['ad_type'] = $value;
			$this;
		}
		public function setAd_name($value){
			return self::$_data ['ad_name'] = $value;
			$this;
		}
		public function setAd_file($value){
			return self::$_data ['ad_file'] = $value;
			$this;
		}
		public function setAd_content($value){
			return self::$_data ['ad_content'] = $value;
			$this;
		}
		public function setAd_url($value){
			return self::$_data ['ad_url'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setWidth($value){
			return self::$_data ['width'] = $value;
			$this;
		}
		public function setHeight($value){
			return self::$_data ['height'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}