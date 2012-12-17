<?php

define ( 'IN_KEKE', TRUE );
include 'app_boot.php';

//get one row 
$res = DB::select()->from('witkey_industry')->limit(0, 1)->get_one()->execute();
//get one field values 
echo DB::select('indus_id')->from('witkey_industry')->limit(0, 1)->get_count()->execute();
var_dump($res);

$re2 = DB::select('indus_id')->from('witkey_industry')->join('left_join witkey_task')
->on('witkey_industry.inuds_id', '=', 'witkey_task.indus_id')->limit(0, 1)->execute();
var_dump($re2);


