<?php

class Keke_db_update extends Keke_db_query {
	
	protected $_table;
	protected $_set=array();
	protected $_value = array();
	
	function __construct($table){
		if($table){
			$this->_table = $table;
		}
		$this->_type  = Database::UPDATE;
		
	}
	/**
	 * 设置表
	 * @param string $table
	 * @return Keke_db_update
	 */
	public function table($table){
		if($table){
			$this->_table  = $table;
		}
		return $this;
	}
	/**
	 * 设置字段
	 * @param array $columns\
	 * @return Keke_db_update
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
	 * @return Keke_db_update
	 */
	public function value(array $values){
		if($values){
			$this->_value = $values;
		}
		return $this;
		
	}
    /**
     * 执行update
     * @see Keke_db_query::execute()
     */
	public function execute($db=null){
		if($db===null){
			$db = Database::instance();
		}
		$query = 'update `'.TABLEPRE.$this->_table .'` set ' ;
		if(is_array($this->_set)){
			array_walk ( $this->_set, array ($db, 'quote_field' ) );
		}
		if(is_array($this->_value)){
			$this->_value = $db->quote_string($this->_value);
		}
		$set_arr = array_combine($this->_set, $this->_value);
		$set_arr = array_filter($set_arr,array('Model','remove_null'));
		foreach ($set_arr as $k=>$v){
			$query .=  $k.'='. $v.',';
		}
        $query = rtrim($query,',');
		if($this->_where){
			$query .= ' where '.$this->_where;
		}
		
		$this->_sql = $query;
		$query = $this->compile($db);
		//var_dump($query);die;
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