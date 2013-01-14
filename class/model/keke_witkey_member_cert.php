<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_cert  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_cert' );
			self::$pk = 'cid';
		}
		 public function getCid(){
			return self::$_data ['cid'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getName(){
			return self::$_data ['name'];
		}
		 public function getYear(){
			return self::$_data ['year'];
		}
		 public function getPic(){
			return self::$_data ['pic'];
		}
		public function setCid($value){
			return self::$_data ['cid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setName($value){
			return self::$_data ['name'] = $value;
			$this;
		}
		public function setYear($value){
			return self::$_data ['year'] = $value;
			$this;
		}
		public function setPic($value){
			return self::$_data ['pic'] = $value;
			$this;
		}
}