<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_match_work  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_match_work' );
			self::$pk = 'mw_id';
		}
		 public function getMw_id(){
			return self::$_data ['mw_id'];
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
		}
		 public function getWiki_deposit(){
			return self::$_data ['wiki_deposit'];
		}
		 public function getDeposit_cash(){
			return self::$_data ['deposit_cash'];
		}
		 public function getDeposit_credit(){
			return self::$_data ['deposit_credit'];
		}
		 public function getWitkey_contact(){
			return self::$_data ['witkey_contact'];
		}
		public function setMw_id($value){
			return self::$_data ['mw_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setWork_id($value){
			return self::$_data ['work_id'] = $value;
			$this;
		}
		public function setWiki_deposit($value){
			return self::$_data ['wiki_deposit'] = $value;
			$this;
		}
		public function setDeposit_cash($value){
			return self::$_data ['deposit_cash'] = $value;
			$this;
		}
		public function setDeposit_credit($value){
			return self::$_data ['deposit_credit'] = $value;
			$this;
		}
		public function setWitkey_contact($value){
			return self::$_data ['witkey_contact'] = $value;
			$this;
		}
}