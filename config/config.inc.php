<?php
define ( 'ADMIN_UID', '1' );
define ( 'DBHOST', 'localhost');
define ( 'DBNAME', 'kppw_google');
define ( 'DBUSER', 'root');
define ( 'DBPASS', '123456');
define ( 'DBCHARSET', 'gbk' );
define ( 'CHARSET', 'gbk' );
define ( 'DBTYPE', 'mysqli' );
define ( 'TABLEPRE', 'keke_');
define ( 'ENCODE_KEY', 'keke' );
define ( 'GZIP', TRUE );
define ( "IS_REWRITE", 0 );
define ( 'IMGDIR', 'resource/img/' );
define ( 'KEKE_DEBUG', 1 );
define ( "TPL_CACHE", 1);
define ( 'IS_CACHE', 0 );
define ( 'CACHE_TYPE', 'file' );
define ( 'COOKIE_DOMAIN', '' );
define ( 'COOKIE_PATH', '/kppw_google/');
define ( 'COOKIE_PRE', 'keke_' );
define ( 'COOKIE_TTL', 0 );
define ( 'SESSION_MODULE', 'files' );
define ( 'SYS_START_TIME', microtime(1) );
/*
 * �����վ����Ŀ¼�£���дĿ¼���� �����治Ҫ��б�ܣ�
* �����վ��Ŀ¼����Ϊ��
*/
define('BASE_URL', '/kppw_google');


//redis ��������ַ
$_K['redis'] = array('host'=>'192.168.1.99','port'=>'6379');

//memcahce ��������ַ

$_K['memcache'] = array('host'=>'127.0.0.1','port'=>'11211');
