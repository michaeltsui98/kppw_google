<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_auth_enterprise  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_auth_enterprise' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getCompany(){
			return self::$_data ['company'];
		}
		 public function getLicen_num(){
			return self::$_data ['licen_num'];
		}
		 public function getLicen_pic(){
			return self::$_data ['licen_pic'];
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
		 public function getLegal(){
			return self::$_data ['legal'];
		}
		 public function getStaff_num(){
			return self::$_data ['staff_num'];
		}
		 public function getRun_years(){
			return self::$_data ['run_years'];
		}
		 public function getUrl(){
			return self::$_data ['url'];
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
		public function setCompany($value){
			return self::$_data ['company'] = $value;
			$this;
		}
		public function setLicen_num($value){
			return self::$_data ['licen_num'] = $value;
			$this;
		}
		public function setLicen_pic($value){
			return self::$_data ['licen_pic'] = $value;
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
		public function setLegal($value){
			return self::$_data ['legal'] = $value;
			$this;
		}
		public function setStaff_num($value){
			return self::$_data ['staff_num'] = $value;
			$this;
		}
		public function setRun_years($value){
			return self::$_data ['run_years'] = $value;
			$this;
		}
		public function setUrl($value){
			return self::$_data ['url'] = $value;
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
		public function setMem($value){
			return self::$_data ['mem'] = $value;
			$this;
		}
}