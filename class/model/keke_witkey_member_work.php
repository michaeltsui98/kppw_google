<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_work  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_work' );
			self::$pk = 'wid';
		}
		 public function getWid(){
			return self::$_data ['wid'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getInc_name(){
			return self::$_data ['inc_name'];
		}
		 public function getInc_indus(){
			return self::$_data ['inc_indus'];
		}
		 public function getInc_time(){
			return self::$_data ['inc_time'];
		}
		 public function getInc_job(){
			return self::$_data ['inc_job'];
		}
		 public function getInc_address(){
			return self::$_data ['inc_address'];
		}
		public function setWid($value){
			return self::$_data ['wid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setInc_name($value){
			return self::$_data ['inc_name'] = $value;
			$this;
		}
		public function setInc_indus($value){
			return self::$_data ['inc_indus'] = $value;
			$this;
		}
		public function setInc_time($value){
			return self::$_data ['inc_time'] = $value;
			$this;
		}
		public function setInc_job($value){
			return self::$_data ['inc_job'] = $value;
			$this;
		}
		public function setInc_address($value){
			return self::$_data ['inc_address'] = $value;
			$this;
		}
}