<?php
define ( 'IN_KEKE', TRUE );
include 'app_boot.php';

/* Cache::instance('redis')->set('1', 'sdsdsds');
Cache::instance('redis')->set('3','reewewwewe',6000);
echo Cache::instance('redis')->get('3'); */
/* $a = Cache::instance('redis')->mget(array('1','2'));
var_dump($a); */

 
 
var_dump(Keke::execute_time());