<?php defined('IN_KEKE') or die('Access Denied'); ?>

2012-12-10 08:52:43 --- CRITICAL: 每日任务状态更新
2012-12-10 08:52:43 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 08:52:43 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 08:52:48 --- CRITICAL: 每日订单状态更新
2012-12-10 08:52:48 --- CRITICAL: 每日订单状态更新
2012-12-10 08:52:48 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 08:52:48 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 08:52:49 --- CRITICAL: 每日订单状态更新
2012-12-10 08:53:00 --- CRITICAL: 每日订单状态更新
2012-12-10 09:14:01 --- CRITICAL: 每日订单状态更新
2012-12-10 09:14:05 --- CRITICAL: 每日数据表优化
2012-12-10 09:15:20 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
2012-12-10 09:15:20 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:15:26 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
2012-12-10 09:15:26 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:15:31 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
2012-12-10 09:15:31 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:15:39 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
2012-12-10 09:15:39 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\config.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:19:18 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\admin\shop\config.php [ 9 ]
2012-12-10 09:19:18 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_config' not found ~ D:\KKserv\wwwroot\kppw_google\control\admin\shop\config.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:20:20 --- ERROR: ErrorException [ 1 ]: Class 'Control_admin_shop_list' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\goods\admin\list.php [ 9 ]
2012-12-10 09:20:20 --- STRACE: ErrorException [ 1 ]: Class 'Control_admin_shop_list' not found ~ D:\KKserv\wwwroot\kppw_google\control\shop\goods\admin\list.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:19 --- ERROR: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
2012-12-10 09:21:19 --- STRACE: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:23 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:21:23 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:26 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:21:26 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:27 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:27 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:33 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:33 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:34 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:21:34 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:36 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:36 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:37 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:21:37 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:38 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:38 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:39 --- ERROR: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
2012-12-10 09:21:39 --- STRACE: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:49 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:21:49 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:51 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:51 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:54 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\dtender\task.php [ 9 ]
2012-12-10 09:21:54 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\dtender\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:56 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\task.php [ 9 ]
2012-12-10 09:21:56 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:21:59 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:21:59 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:22:01 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
2012-12-10 09:22:01 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:22:34 --- ERROR: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
2012-12-10 09:22:34 --- STRACE: ErrorException [ 1 ]: Class 'Sys_task_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\tread.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:24:11 --- ERROR: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/sreward/tread.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
2012-12-10 09:24:11 --- STRACE: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/sreward/tread.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::error_handler(2, 'require(D:\KKse...', 'D:\KKserv\wwwro...', 61, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::autoload()
#2 [internal function]: Keke_core::autoload('Control_task_sr...')
#3 D:\KKserv\wwwroot\kppw_google\control\task\sreward\admin\list.php(47): spl_autoload_call('Control_task_sr...')
#4 [internal function]: Control_task_sreward_admin_list->action_index()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_task_sreward_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-10 09:25:25 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_sreward_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\admin\list.php [ 47 ]
2012-12-10 09:25:25 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_sreward_tread' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\sreward\admin\list.php [ 47 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:27:04 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
2012-12-10 09:27:04 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\mreward\task.php [ 9 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:29:02 --- ERROR: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/mreward/task.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
2012-12-10 09:29:02 --- STRACE: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/mreward/task.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::error_handler(2, 'require(D:\KKse...', 'D:\KKserv\wwwro...', 61, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::autoload()
#2 [internal function]: Keke_core::autoload('Control_task_mr...')
#3 D:\KKserv\wwwroot\kppw_google\control\task\mreward\admin\list.php(47): spl_autoload_call('Control_task_mr...')
#4 [internal function]: Control_task_mreward_admin_list->action_index()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_task_mreward_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-10 09:31:35 --- ERROR: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/mreward/task.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
2012-12-10 09:31:35 --- STRACE: ErrorException [ 2 ]: require(D:\KKserv\wwwroot\kppw_google\control/task/mreward/task.php) [function.require]: failed to open stream: No such file or directory ~ D:\KKserv\wwwroot\kppw_google\class\keke\core.php [ 61 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::error_handler(2, 'require(D:\KKse...', 'D:\KKserv\wwwro...', 61, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\keke\core.php(61): Keke_core::autoload()
#2 [internal function]: Keke_core::autoload('Control_task_mr...')
#3 D:\KKserv\wwwroot\kppw_google\control\task\mreward\admin\list.php(47): spl_autoload_call('Control_task_mr...')
#4 [internal function]: Control_task_mreward_admin_list->action_index()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_task_mreward_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-10 09:31:38 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_preward_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\admin\list.php [ 47 ]
2012-12-10 09:31:38 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_preward_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\preward\admin\list.php [ 47 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:31:45 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_tender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\admin\list.php [ 48 ]
2012-12-10 09:31:45 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_tender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\admin\list.php [ 48 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:31:48 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_dtender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\dtender\admin\list.php [ 47 ]
2012-12-10 09:31:48 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_dtender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\dtender\admin\list.php [ 47 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:32:53 --- ERROR: ErrorException [ 1 ]: Class 'Control_task_tender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\admin\list.php [ 48 ]
2012-12-10 09:32:53 --- STRACE: ErrorException [ 1 ]: Class 'Control_task_tender_task' not found ~ D:\KKserv\wwwroot\kppw_google\control\task\tender\admin\list.php [ 48 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 09:57:50 --- CRITICAL: 每日任务状态更新
2012-12-10 09:57:50 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 09:57:50 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 09:57:51 --- CRITICAL: 每日订单状态更新
2012-12-10 10:29:51 --- CRITICAL: 每日订单状态更新
2012-12-10 10:58:11 --- CRITICAL: 每日任务状态更新
2012-12-10 10:58:11 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 10:58:11 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 10:59:55 --- CRITICAL: 每日订单状态更新
2012-12-10 11:04:46 --- ERROR: Keke_exception [ 1062 ]: Duplicate entry '57' for key 1 [ insert into `keke_witkey_space` (`uid`,`username`,`email`,`reg_time`,`reg_ip`,`last_login_time`,`status`,`buyer_level`,`seller_level`)  values ('57','enter1','enter1@qq.com','1355108686','127.0.0.1','1355108686','1','1','1') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-10 11:04:46 --- STRACE: Keke_exception [ 1062 ]: Duplicate entry '57' for key 1 [ insert into `keke_witkey_space` (`uid`,`username`,`email`,`reg_time`,`reg_ip`,`last_login_time`,`status`,`buyer_level`,`seller_level`)  values ('57','enter1','enter1@qq.com','1355108686','127.0.0.1','1355108686','1','1','1') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('Duplicate entry...', 'insert into `ke...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('insert into `ke...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\insert.php(69): Keke_driver_mysql->query('insert into `ke...', 2)
#3 D:\KKserv\wwwroot\kppw_google\class\keke\user\register.php(76): Keke_db_insert->execute()
#4 D:\KKserv\wwwroot\kppw_google\class\keke\user\register\keke.php(22): Keke_user_register->complete_reg(NULL, 'enter1')
#5 D:\KKserv\wwwroot\kppw_google\control\register.php(45): Keke_user_register_keke->reg()
#6 [internal function]: Control_register->action_reg()
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_register))
#8 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#9 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#10 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#11 {main}
2012-12-10 11:05:23 --- ERROR: Keke_exception [ 1062 ]: Duplicate entry '58' for key 1 [ insert into `keke_witkey_space` (`uid`,`username`,`email`,`reg_time`,`reg_ip`,`last_login_time`,`status`,`buyer_level`,`seller_level`)  values ('58','enter2','enter2@qq.com','1355108723','127.0.0.1','1355108723','1','1','1') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-10 11:05:23 --- STRACE: Keke_exception [ 1062 ]: Duplicate entry '58' for key 1 [ insert into `keke_witkey_space` (`uid`,`username`,`email`,`reg_time`,`reg_ip`,`last_login_time`,`status`,`buyer_level`,`seller_level`)  values ('58','enter2','enter2@qq.com','1355108723','127.0.0.1','1355108723','1','1','1') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('Duplicate entry...', 'insert into `ke...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('insert into `ke...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\insert.php(69): Keke_driver_mysql->query('insert into `ke...', 2)
#3 D:\KKserv\wwwroot\kppw_google\class\keke\user\register.php(76): Keke_db_insert->execute()
#4 D:\KKserv\wwwroot\kppw_google\class\keke\user\register\keke.php(22): Keke_user_register->complete_reg(NULL, 'enter2')
#5 D:\KKserv\wwwroot\kppw_google\control\register.php(45): Keke_user_register_keke->reg()
#6 [internal function]: Control_register->action_reg()
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_register))
#8 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#9 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#10 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#11 {main}
2012-12-10 11:29:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 11:29:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 11:30:03 --- CRITICAL: 每日订单状态更新
2012-12-10 14:00:47 --- CRITICAL: 每日任务状态更新
2012-12-10 14:00:47 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 14:00:47 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 14:00:48 --- CRITICAL: 每日订单状态更新
2012-12-10 14:35:40 --- CRITICAL: 每日订单状态更新
2012-12-10 15:22:04 --- CRITICAL: 每日任务状态更新
2012-12-10 15:22:04 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 15:22:04 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 15:22:10 --- CRITICAL: 每日订单状态更新
2012-12-10 16:31:44 --- CRITICAL: 每日任务状态更新
2012-12-10 16:31:44 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 16:31:44 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 16:31:46 --- CRITICAL: 每日订单状态更新
2012-12-10 16:55:09 --- ERROR: ErrorException [ 1 ]: Class 'Keke_oauth_alipay_client' not found ~ D:\KKserv\wwwroot\kppw_google\class\keke\oauth\login.php [ 29 ]
2012-12-10 16:55:09 --- STRACE: ErrorException [ 1 ]: Class 'Keke_oauth_alipay_client' not found ~ D:\KKserv\wwwroot\kppw_google\class\keke\oauth\login.php [ 29 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-10 16:58:37 --- ERROR: ErrorException [ 4096 ]: Object of class Control_user_account_bind could not be converted to string ~ D:\KKserv\wwwroot\kppw_google\data\tpl_c\tpl_default_user_account_bind.php [ 171 ]
2012-12-10 16:58:37 --- STRACE: ErrorException [ 4096 ]: Object of class Control_user_account_bind could not be converted to string ~ D:\KKserv\wwwroot\kppw_google\data\tpl_c\tpl_default_user_account_bind.php [ 171 ]
--
#0 D:\KKserv\wwwroot\kppw_google\data\tpl_c\tpl_default_user_account_bind.php(171): Keke_core::error_handler(4096, 'Object of class...', 'D:\KKserv\wwwro...', 171, Array)
#1 D:\KKserv\wwwroot\kppw_google\control\user\account\bind.php(28): require('D:\KKserv\wwwro...')
#2 [internal function]: Control_user_account_bind->action_index()
#3 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_bind))
#4 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#6 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#7 {main}
2012-12-10 17:01:59 --- CRITICAL: 每日订单状态更新
2012-12-10 17:39:40 --- CRITICAL: 每日任务状态更新
2012-12-10 17:39:40 --- DEBUG: Control_task_mreward_cronrun
2012-12-10 17:39:40 --- DEBUG: Control_task_sreward_cronrun
2012-12-10 17:39:41 --- CRITICAL: 每日订单状态更新
2012-12-10 17:43:32 --- ERROR: Keke_exception [ 0 ]: The requested URL login/static/img/system/logo.ico was not found on this server. ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 90 ]
2012-12-10 17:43:32 --- STRACE: Keke_exception [ 0 ]: The requested URL login/static/img/system/logo.ico was not found on this server. ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 90 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 17:45:53 --- ERROR: Keke_exception [ 0 ]: The requested URL user/accont_bind/bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 17:45:53 --- STRACE: Keke_exception [ 0 ]: The requested URL user/accont_bind/bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 17:46:08 --- ERROR: Keke_exception [ 0 ]: The requested URL user/accont_bind/bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 17:46:08 --- STRACE: Keke_exception [ 0 ]: The requested URL user/accont_bind/bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 17:46:40 --- ERROR: Keke_exception [ 0 ]: The requested URL user/accont_bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 17:46:40 --- STRACE: Keke_exception [ 0 ]: The requested URL user/accont_bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 17:46:50 --- ERROR: Keke_exception [ 0 ]: The requested URL user/accont_bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 17:46:50 --- STRACE: Keke_exception [ 0 ]: The requested URL user/accont_bind was not found on this server. Control_user_accont_bind ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 17:52:52 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-10 17:52:52 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-10 18:15:51 --- CRITICAL: 每日订单状态更新