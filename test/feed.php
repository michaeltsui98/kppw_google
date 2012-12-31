<?php define ( 'IN_KEKE', TRUE );

include '../app_boot.php';

Sys_feed::get_instance()->set_user(5, 'test4')

->set_action('发布了任务')->set_obj('task', '4', '找人做一个网站')

->to_feed();


