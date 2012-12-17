<?php
class Keke_db {
	/**
	 * 查询操作
	 * @param $type string       	
	 * @param $sql string       	
	 * @return keke_db_query
	 */
	public static function query($sql, $type=null) {
		return new Keke_db_query ( $sql, $type);
	}
	/**
	 * 对象化查询
	 * @param $columns string ',' 隔开       	
	 * @return keke_db_select
	 */
	public static function select($columns = NULL) {
		return new Keke_db_select ( $columns );
	}
	/**
	 * 对象化更新
	 */
	public static function update($table=null){
		return new Keke_db_update($table);
	}
	/**
	 * 对象化删除
	 */
	public static function delete($table=null){
		return new Keke_db_delete($table);
	}
	/**
	 * 对象化插入
	 */
	public static function insert($table=null,array $columns=null){
		return new Keke_db_insert($table,$columns);
	}
}
