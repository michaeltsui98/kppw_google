<?php
class Dbfactory {
	
	public static $db_obj = null;
	public static $instance = null;
	public static function execute($sql) {
		return Database::instance ()->execute ( $sql );
	}
	public static function query($sql, $is_cache = 0, $cache_time = 0, $is_unbuffer = 0) {
		return Database::instance ()->query ( $sql );
	}
	public static function select($sql) {
		
		return Database::instance ()->query ( $sql, Database::SELECT );
	}
	public static function insert($sql) {
		return Database::instance ()->query ( $sql, Database::INSERT );
	}
	public static function update($sql) {
		return Database::instance ()->query ( $sql, Database::UPDATE );
	}
	public static function delete($sql) {
		return Database::instance ()->query ( $sql, Database::DELETE );
	}
	
	public static function inserttable($tablename, $insertsqlarr, $returnid = 1, $replace = false) {
		return Database::instance ()->insert ( $tablename, $insertsqlarr, $returnid, $replace );
	}
	public static function updatetable($tablename, $setsqlarr, $wheresqlarr) {
		return Database::instance ()->update ( $tablename, $setsqlarr, $wheresqlarr );
	}
	public static function get_one($sql, $cache_time = 0) {
		return Database::instance ()->get_one_row ( $sql );
	}
	
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		return Database::instance ()->select ( $fileds, $table, $where, $order, $group, $limit, $pk,$cachetime );
	}
	public static function get_count($sql, $row = 0, $field = null){
		return Database::instance()->get_count($sql,$row,$field);
	}
}