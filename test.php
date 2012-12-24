<?php define ( "IN_KEKE", TRUE );

include 'app_boot.php';


$arr = Sys_task_trade::instance()->task_status();

var_dump($arr);


die;
