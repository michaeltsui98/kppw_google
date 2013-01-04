<?php defined ('IN_KEKE' ) or die ( 'Access Denied' );
	class Keke_witkey_task_temp  extends Model {
	    protected static $_data = array ();
	     function  __construct(){ 			 parent::__construct ( 'witkey_task_temp' );		 }	    
	    		public function getId(){			 return self::$_data ['id']; 		}		public function getTask_title(){			 return self::$_data ['task_title']; 		}		public function getTask_cash(){			 return self::$_data ['task_cash']; 		}		public function getTask_desc(){			 return self::$_data ['task_desc']; 		}		public function getTask_file(){			 return self::$_data ['task_file']; 		}		public function getTask_contact(){			 return self::$_data ['task_contact']; 		}		public function getTask_pay_item(){			 return self::$_data ['task_pay_item']; 		}		public function getTask_indus(){			 return self::$_data ['task_indus']; 		}		public function getModel_code(){			 return self::$_data ['model_code']; 		}		public function getSub_time(){			 return self::$_data ['sub_time']; 		}		public function getOn_time(){			 return self::$_data ['on_time']; 		}		public function getFp_title(){			 return self::$_data ['fp_title']; 		}		public function getFp_linxiren(){			 return self::$_data ['fp_linxiren']; 		}		public function getFp_address(){			 return self::$_data ['fp_address']; 		}		public function getFp_zip(){			 return self::$_data ['fp_zip']; 		}		public function getFp_mobile(){			 return self::$_data ['fp_mobile']; 		}		public function getFp_use(){			 return self::$_data ['fp_use']; 		}		public function getWhere(){			 return self::$_where; 		}
	    		public function setId($value){ 			 self::$_data ['id'] = $value;			 return $this ; 		}		public function setTask_title($value){ 			 self::$_data ['task_title'] = $value;			 return $this ; 		}		public function setTask_cash($value){ 			 self::$_data ['task_cash'] = $value;			 return $this ; 		}		public function setTask_desc($value){ 			 self::$_data ['task_desc'] = $value;			 return $this ; 		}		public function setTask_file($value){ 			 self::$_data ['task_file'] = $value;			 return $this ; 		}		public function setTask_contact($value){ 			 self::$_data ['task_contact'] = $value;			 return $this ; 		}		public function setTask_pay_item($value){ 			 self::$_data ['task_pay_item'] = $value;			 return $this ; 		}		public function setTask_indus($value){ 			 self::$_data ['task_indus'] = $value;			 return $this ; 		}		public function setModel_code($value){ 			 self::$_data ['model_code'] = $value;			 return $this ; 		}		public function setSub_time($value){ 			 self::$_data ['sub_time'] = $value;			 return $this ; 		}		public function setOn_time($value){ 			 self::$_data ['on_time'] = $value;			 return $this ; 		}		public function setFp_title($value){ 			 self::$_data ['fp_title'] = $value;			 return $this ; 		}		public function setFp_linxiren($value){ 			 self::$_data ['fp_linxiren'] = $value;			 return $this ; 		}		public function setFp_address($value){ 			 self::$_data ['fp_address'] = $value;			 return $this ; 		}		public function setFp_zip($value){ 			 self::$_data ['fp_zip'] = $value;			 return $this ; 		}		public function setFp_mobile($value){ 			 self::$_data ['fp_mobile'] = $value;			 return $this ; 		}		public function setFp_use($value){ 			 self::$_data ['fp_use'] = $value;			 return $this ; 		}		public function setWhere($value){ 			 self::$_where = $value;			 return $this; 		}		public function setData($array){ 			self::$_data = array_filter($array,array('Model','remove_null')); 			return $this; 		} 
	    /**		 * insert into  keke_witkey_task_temp  ,or add new record		 * @return int last_insert_id		 */		function create($return_last_id=1){		 $res = $this->_db->insert ( $this->_tablename, self::$_data, $return_last_id, $this->_replace ); 		 $this->reset(); 			 return $res; 		 } 
	    /**		 * update table keke_witkey_task_temp		 * @return int affected_rows		 */		function update() {				if ($this->getWhere()) { 					$res =  $this->_db->update ( $this->_tablename, self::$_data, $this->getWhere());				} elseif (isset ( self::$_data ['id'] )) { 						self::$_where = array ('id' => self::$_data ['id'] );						unset(self::$_data['id']);						$res = $this->_db->update ( $this->_tablename, self::$_data, $this->getWhere() );				}				$this->reset();				return $res;		}
	    /**		 * query table: keke_witkey_task_temp,if isset where return where record,else return all record		 * @return array 		 */		function query($fields = '*',$cache_time = 0){ 			 empty ( $fields ) and $fields = '*';			 if($this->getWhere()){ 				 $sql = "select $fields from $this->_tablename where ".$this->getWhere(); 			 }else{ 				 $sql = "select $fields from $this->_tablename"; 			 } 			 empty($fields) and $fields = '*'; 			 $this->reset();			 return $this->_db->cached ( $cache_time )->cache_data ( $sql );		 } 
	    /**		 * query count keke_witkey_task_temp records,if iset where query by where 		 * @return int count records		 */		function count(){ 			 if($this->getWhere()){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->getWhere(); 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->reset(); 			 return $this->_db->get_count ( $sql ); 		 } 
	    /**		 * delete table keke_witkey_task_temp, if isset where delete by where 		 * @return int deleted affected_rows 		 */		function del(){ 			 if($this->getWhere()){ 				 $sql = "delete from $this->_tablename where ".$this->getWhere(); 			 } 			 else{ 				 $sql = "delete from $this->_tablename where id = $this->_id "; 			 } 			 $this->reset(); 			 return $this->_db->query ( $sql, Database::DELETE ); 		 } 
   } //end 