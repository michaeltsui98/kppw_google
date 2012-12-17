<?php

class DBbackup {
	
	static function run_backup() {
		global $_lang;
		$output = array();
		$db_factory = new Dbfactory();
		$tables = $db_factory->query ( " show table status from `".DBNAME."`");
		$temp_arr = array ();
		foreach ( $tables as $v ) {
			if (substr ( $v [Name], 0, strlen ( TABLEPRE ) ) == TABLEPRE) {
				$temp_arr [] = $v;
			}
		}
		$tables = $temp_arr;
		$sqlmsg = '';
		foreach ( $tables as $tablesarr ) {
			$table_name = $tablesarr ['Name'];
			$table_type = $tablesarr ['Type'];
			$result = $db_factory->query ( "show fields from " . $table_name );
			$sqlmsg .= "#" . $_lang['table_name'] . "：<" . $table_name . ">\n";
			$sqlmsg .= "DROP TABLE IF EXISTS `" . $table_name . "`;\n####################\n";
			$sqlmsg .= "CREATE TABLE `" . $table_name . "`(\n";
			foreach ( $result as $fileds ) {
				//构造建表的程序
				//得到每个字段的名称，类型，长度及其它标志
				$field_name = $fileds ['Field']; //字段名
				$field_type = $fileds ['Type']; //字段类型(长度)
				$field_len = $fileds ['Null']; //字段NULL值
				if ($fileds ['Extra'] != "") {
					$fileds ['Extra'] = " " . $fileds ['Extra'];
				}
				if ($field_len != "") {
					$field_len = " " . $field_len;
				}
				if (isset ( $fileds ['Default'] )) {
					$field_flag = "default '" . $fileds ['Default'] . "'" . $fileds ['Extra']; //字段标志
				} else {
					$field_flag = "default NULL" . $fileds ['Extra']; //字段标志
				}
				if ($fileds ['Key'] == 'PRI') {
					$field_flag = " NOT NULL " . $fileds ['Extra']; //字段标志
				}
				$fields [] = "`" . $field_name . "`";
				$sqlmsg .= " `" . $field_name . "` " . $field_type . " " . $field_flag . ",\n";
			}
			$key_result = $db_factory->query ( "show keys from " . $table_name );
			foreach ( $key_result as $keyr ) {
				if ($keyr ["Key_name"] == "PRIMARY"){
					$sqlmsg .= " PRIMARY KEY (`" . $keyr ["Column_name"] . "`),\n";
				}elseif (($keyr ["Key_name"] != "PRIMARY") && ($keyr ["Non_unique"] == 0)){
					$sqlmsg .= " UNIQUE KEY " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}elseif ($keyr ["Comment"] == "FULLTEXT"){
					$sqlmsg .= " FULLTEXT " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}else{
					$sqlmsg .= " KEY " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}
			}
			$r = $db_factory->query ( "show create table $table_name" );
			$eng = $r [0] ['Create Table'];
			preg_match ( '/engine=([^ ]+)/i', $eng, $arr );
			$sqlmsg = preg_replace ( "/\,$/", "", $sqlmsg );
			$sqlmsg .= " ) ENGINE=$arr[1] AUTO_INCREMENT=0 DEFAULT CHARSET=" . DBCHARSET . " ;\n####################\n";
			//构造插入语句的程序
			$field = join ( ",", $fields );
			$sql = $db_factory->query ( "select " . $field . " from " . $table_name );
			$field_a = explode ( ',', $field );
			foreach ( $sql as $r ) {
				$sqlmsg .= "insert into " . $table_name . " (" . $field . ") values(";
				$iii = 0;
				foreach ( $r as $k => $v ) {
					if ($iii ++) {
						$sqlmsg .= ",";
					}
					if ($v) {
						$sqlmsg .= "'" . Keke::k_addslashes ( $v ) . "'";
					} else {
						$sqlmsg .= "'0'";
					}
				}
				$sqlmsg .= ");\n#####";
			}
			unset ( $fields ); //清空字段数组以便下次循环继续储存新的字段数据
			$output[] = str_replace(TABLEPRE.'witkey_', '**********************',$table_name);
		}
		$sqlmsg .= "\n "; //结束
		$path = S_ROOT . './data/backup/backup_' . time () . '_' . DBNAME . ".sql";
		Keke_tpl::swritefile ( $path, $sqlmsg );
		Keke::admin_system_log ( $_lang['backup_database'] . '' . "backup_" . time () . '_' . DBNAME . ".sql" );
		file_exists ( $path ) and Keke::echojson('',1,$output) or Keke::echojson('',0,$output);
		die();
	}
}