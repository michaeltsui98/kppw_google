<?php
class Keke_db_delete extends Keke_db_query {
	protected $_table;
	function __construct($table=null){
		if($table){
			$this->_table = $table;
		}
		$this->_type = Database::DELETE;
	}
	/**
	 * 
	 * @param string $table
	 * @return Keke_db_delete
	 */
	public function table($table){
		$this->_table = $table;
		return $this;
	}
	/**
	 * 
	 * @param string $where
	 * @return Keke_db_delete
	 */
	public function where($where){
		if($where){
			$this->_where = $where;
		}
		return $this;
	}
	/**
	 * Éú³ÉSQLÓï¾ä
	 * @see Keke_db_query::compile()
	 */
	public function execute($db=null){
		if($db===null){
			$db = Database::instance();
		}
	    $query = "delete from  `".TABLEPRE.$this->_table."`";
	    if ( ! empty($this->_where)){
	    	$query .= ' WHERE '.$this->_where;
	    }
	    $this->_sql = $query;
	    $query = $this->compile($db);
	    $this->reset();
	    return $db->query($query,$this->_type);
	} 
	protected  function reset(){
		$this->_sql = null;
		$this->_table = null;
		$this->_parameters = null;
		$this->_where = null;
		return $this;
	}
	
}
