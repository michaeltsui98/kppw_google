<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_status  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_status' );
			self::$pk = 's';
		}
		 public function getS(){
			return self::$_data ['s'];
		}
		 public function getSid(){
			return self::$_data ['sid'];
		}
		 public function getScode(){
			return self::$_data ['scode'];
		}
		 public function getStype(){
			return self::$_data ['stype'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		public function setS($value){
			return self::$_data ['s'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setSid($value){
			return self::$_data ['sid'] = $value;
			$this;
		}
		public function setScode($value){
			return self::$_data ['scode'] = $value;
			$this;
		}
		public function setStype($value){
			return self::$_data ['stype'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
}