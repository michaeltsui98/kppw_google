<?php

class Keke_db_insert extends Keke_db_query {
	
	protected $_table;
	protected $_set=array();
	protected $_value = array();
	
	function __construct($table){
		if($table){
			$this->_table = $table;
		}
		$this->_type  = Database::INSERT;
		
	}
	/**
	 * 设置表
	 * @param string $table
	 * @return Keke_db_insert
	 */
	public function into($table){
		if($table){
			$this->_table  = $table;
		}
		return $this;
	}
	/**
	 * 设置字段
	 * @param array $columns\
	 * @return Keke_db_insert
	 */
	public function set(array $columns){
		if($columns){
			$this->_set = $columns;
		}
		return $this;
	}
	/**
	 * 设置值
	 * @param array $values
	 * @return Keke_db_insert
	 */
	public function value(array $values){
		if($values){
			$this->_value = $values;
		}
		return $this;
		
	}

	public function execute($db=null){
		if($db===null){
			$db = Database::instance();
		}
		$query = 'insert into `'.TABLEPRE.$this->_table .'`' ;
		if(is_array($this->_set)){
			array_walk ( $this->_set, array ($db, 'quote_field' ) );
			$fileds = implode ( ',', $this->_set );
			$query .= ' ('.$fileds.') ';
		}
		if(is_array($this->_value)){
			$values = $db->quote_string($this->_value);
			$query .= ' values ('.implode(',', $values).')';
		}
	
		$this->_sql = $query;
		$query = $this->compile($db);
		$this->reset();
		return $db->query($query,$this->_type);
		
	}
	
	protected  function reset(){
		$this->_sql = null;
		$this->_where = null;
		$this->_set = array();
		$this->_value = array();
		$this->_table = null;
		$this->_parameters = null;
		return $this;				
	}

}