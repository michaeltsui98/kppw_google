<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_auth_realname  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_auth_realname' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getRealname(){
			return self::$_data ['realname'];
		}
		 public function getId_code(){
			return self::$_data ['id_code'];
		}
		 public function getId_pic(){
			return self::$_data ['id_pic'];
		}
		 public function getPic(){
			return self::$_data ['pic'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getAuth_status(){
			return self::$_data ['auth_status'];
		}
		 public function getMem(){
			return self::$_data ['mem'];
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setRealname($value){
			return self::$_data ['realname'] = $value;
			$this;
		}
		public function setId_code($value){
			return self::$_data ['id_code'] = $value;
			$this;
		}
		public function setId_pic($value){
			return self::$_data ['id_pic'] = $value;
			$this;
		}
		public function setPic($value){
			return self::$_data ['pic'] = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
			$this;
		}
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setAuth_status($value){
			return self::$_data ['auth_status'] = $value;
			$this;
		}
		public function setMem($value){
			return self::$_data ['mem'] = $value;
			$this;
		}
}