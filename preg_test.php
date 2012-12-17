<?php

define('IN_KEKE', TRUE);

include 'app_boot.php';
 
$arr = array('{任务编号}'=>'1231','{任务标题}'=>'任务标题test',
		'{任务链接}'=>'<a href="">test</a>',
		'{任务状态}'=>'选搞中','{开始时间}'=>'2012-11-05','{投稿结束时间}'=>'20130905',
		'{选稿结束时间}'=>'2013-01-2'
		);

//站内信测试 
Keke_msg::instance()->set_tpl('task_pub')->set_var($arr)->to_user(1)->send();


 
