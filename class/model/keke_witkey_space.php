<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_space  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_space' );
			self::$pk = 'uid';
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getGroup_id(){
			return self::$_data ['group_id'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getUser_type(){
			return self::$_data ['user_type'];
		}
		 public function getSex(){
			return self::$_data ['sex'];
		}
		 public function getResidency(){
			return self::$_data ['residency'];
		}
		 public function getAddress(){
			return self::$_data ['address'];
		}
		 public function getBirthday(){
			return self::$_data ['birthday'];
		}
		 public function getTruename(){
			return self::$_data ['truename'];
		}
		 public function getQq(){
			return self::$_data ['qq'];
		}
		 public function getFax(){
			return self::$_data ['fax'];
		}
		 public function getPhone(){
			return self::$_data ['phone'];
		}
		 public function getMobile(){
			return self::$_data ['mobile'];
		}
		 public function getEmail(){
			return self::$_data ['email'];
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getIndus_pid(){
			return self::$_data ['indus_pid'];
		}
		 public function getSkill_ids(){
			return self::$_data ['skill_ids'];
		}
		 public function getSummary(){
			return self::$_data ['summary'];
		}
		 public function getReg_time(){
			return self::$_data ['reg_time'];
		}
		 public function getReg_ip(){
			return self::$_data ['reg_ip'];
		}
		 public function getDomain(){
			return self::$_data ['domain'];
		}
		 public function getCredit(){
			return self::$_data ['credit'];
		}
		 public function getBalance(){
			return self::$_data ['balance'];
		}
		 public function getPub_num(){
			return self::$_data ['pub_num'];
		}
		 public function getTake_num(){
			return self::$_data ['take_num'];
		}
		 public function getNominate_num(){
			return self::$_data ['nominate_num'];
		}
		 public function getAccepted_num(){
			return self::$_data ['accepted_num'];
		}
		 public function getMsg_num(){
			return self::$_data ['msg_num'];
		}
		 public function getScore(){
			return self::$_data ['score'];
		}
		 public function getBuyer_credit(){
			return self::$_data ['buyer_credit'];
		}
		 public function getBuyer_good_num(){
			return self::$_data ['buyer_good_num'];
		}
		 public function getBuyer_total_num(){
			return self::$_data ['buyer_total_num'];
		}
		 public function getSeller_credit(){
			return self::$_data ['seller_credit'];
		}
		 public function getSeller_good_num(){
			return self::$_data ['seller_good_num'];
		}
		 public function getSeller_total_num(){
			return self::$_data ['seller_total_num'];
		}
		 public function getLast_login_time(){
			return self::$_data ['last_login_time'];
		}
		 public function getClient_status(){
			return self::$_data ['client_status'];
		}
		 public function getRecommend(){
			return self::$_data ['recommend'];
		}
		 public function getBuyer_level(){
			return self::$_data ['buyer_level'];
		}
		 public function getSeller_level(){
			return self::$_data ['seller_level'];
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
		public function setGroup_id($value){
			return self::$_data ['group_id'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setUser_type($value){
			return self::$_data ['user_type'] = $value;
			$this;
		}
		public function setSex($value){
			return self::$_data ['sex'] = $value;
			$this;
		}
		public function setResidency($value){
			return self::$_data ['residency'] = $value;
			$this;
		}
		public function setAddress($value){
			return self::$_data ['address'] = $value;
			$this;
		}
		public function setBirthday($value){
			return self::$_data ['birthday'] = $value;
			$this;
		}
		public function setTruename($value){
			return self::$_data ['truename'] = $value;
			$this;
		}
		public function setQq($value){
			return self::$_data ['qq'] = $value;
			$this;
		}
		public function setFax($value){
			return self::$_data ['fax'] = $value;
			$this;
		}
		public function setPhone($value){
			return self::$_data ['phone'] = $value;
			$this;
		}
		public function setMobile($value){
			return self::$_data ['mobile'] = $value;
			$this;
		}
		public function setEmail($value){
			return self::$_data ['email'] = $value;
			$this;
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			$this;
		}
		public function setIndus_pid($value){
			return self::$_data ['indus_pid'] = $value;
			$this;
		}
		public function setSkill_ids($value){
			return self::$_data ['skill_ids'] = $value;
			$this;
		}
		public function setSummary($value){
			return self::$_data ['summary'] = $value;
			$this;
		}
		public function setReg_time($value){
			return self::$_data ['reg_time'] = $value;
			$this;
		}
		public function setReg_ip($value){
			return self::$_data ['reg_ip'] = $value;
			$this;
		}
		public function setDomain($value){
			return self::$_data ['domain'] = $value;
			$this;
		}
		public function setCredit($value){
			return self::$_data ['credit'] = $value;
			$this;
		}
		public function setBalance($value){
			return self::$_data ['balance'] = $value;
			$this;
		}
		public function setPub_num($value){
			return self::$_data ['pub_num'] = $value;
			$this;
		}
		public function setTake_num($value){
			return self::$_data ['take_num'] = $value;
			$this;
		}
		public function setNominate_num($value){
			return self::$_data ['nominate_num'] = $value;
			$this;
		}
		public function setAccepted_num($value){
			return self::$_data ['accepted_num'] = $value;
			$this;
		}
		public function setMsg_num($value){
			return self::$_data ['msg_num'] = $value;
			$this;
		}
		public function setScore($value){
			return self::$_data ['score'] = $value;
			$this;
		}
		public function setBuyer_credit($value){
			return self::$_data ['buyer_credit'] = $value;
			$this;
		}
		public function setBuyer_good_num($value){
			return self::$_data ['buyer_good_num'] = $value;
			$this;
		}
		public function setBuyer_total_num($value){
			return self::$_data ['buyer_total_num'] = $value;
			$this;
		}
		public function setSeller_credit($value){
			return self::$_data ['seller_credit'] = $value;
			$this;
		}
		public function setSeller_good_num($value){
			return self::$_data ['seller_good_num'] = $value;
			$this;
		}
		public function setSeller_total_num($value){
			return self::$_data ['seller_total_num'] = $value;
			$this;
		}
		public function setLast_login_time($value){
			return self::$_data ['last_login_time'] = $value;
			$this;
		}
		public function setClient_status($value){
			return self::$_data ['client_status'] = $value;
			$this;
		}
		public function setRecommend($value){
			return self::$_data ['recommend'] = $value;
			$this;
		}
		public function setBuyer_level($value){
			return self::$_data ['buyer_level'] = $value;
			$this;
		}
		public function setSeller_level($value){
			return self::$_data ['seller_level'] = $value;
			$this;
		}
}