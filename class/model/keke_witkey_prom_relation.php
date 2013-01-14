<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_prom_relation  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_prom_relation' );
			self::$pk = 'relation_id';
		}
		 public function getRelation_id(){
			return self::$_data ['relation_id'];
		}
		 public function getProm_type(){
			return self::$_data ['prom_type'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getProm_uid(){
			return self::$_data ['prom_uid'];
		}
		 public function getProm_username(){
			return self::$_data ['prom_username'];
		}
		 public function getRelation_status(){
			return self::$_data ['relation_status'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setRelation_id($value){
			return self::$_data ['relation_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setProm_type($value){
			return self::$_data ['prom_type'] = $value;
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
		public function setProm_uid($value){
			return self::$_data ['prom_uid'] = $value;
			$this;
		}
		public function setProm_username($value){
			return self::$_data ['prom_username'] = $value;
			$this;
		}
		public function setRelation_status($value){
			return self::$_data ['relation_status'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}