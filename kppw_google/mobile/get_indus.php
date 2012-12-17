<?php


$indus_arr = db_factory::query("select * from keke_witkey_industry ");
$res = kekezu::echojson('get_indus',1,$indus_arr);
die();