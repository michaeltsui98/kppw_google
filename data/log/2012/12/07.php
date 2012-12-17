<?php defined('IN_KEKE') or die('Access Denied'); ?>

2012-12-07 15:23:29 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php [ 84 ]
2012-12-07 15:23:29 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php [ 84 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 15:33:57 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'b.group_id = 2
where a.uid = 5' at line 9 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_space as b
on a.uid = b.uid
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =1 ,
b.truename = a.realname,
c.realname = 1
b.group_id = 2
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 15:33:57 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'b.group_id = 2
where a.uid = 5' at line 9 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_space as b
on a.uid = b.uid
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =1 ,
b.truename = a.realname,
c.realname = 1
b.group_id = 2
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update  `keke_w...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update  `keke_w...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update  `keke_w...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\realname\admin\list.php(79): Keke_db_query->execute()
#4 [internal function]: Control_auth_realname_admin_list->action_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_realname_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 15:47:40 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'a.mem = '身份证过期了' 
where a.uid = 5' at line 6 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =0 ,
c.realname = 0
a.mem = '身份证过期了' 
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 15:47:40 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'a.mem = '身份证过期了' 
where a.uid = 5' at line 6 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =0 ,
c.realname = 0
a.mem = '身份证过期了' 
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update  `keke_w...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update  `keke_w...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update  `keke_w...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\realname\admin\list.php(104): Keke_db_query->execute()
#4 [internal function]: Control_auth_realname_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_realname_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 15:48:01 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'a.mem = 'wewewe' 
where a.uid = 5' at line 6 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =0 ,
c.realname = 0
a.mem = 'wewewe' 
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 15:48:01 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'a.mem = 'wewewe' 
where a.uid = 5' at line 6 [ update  `keke_witkey_auth_realname` as a 
left join keke_witkey_member_auth as c 
on a.uid = c.uid
set a.auth_status =0 ,
c.realname = 0
a.mem = 'wewewe' 
where a.uid = 5 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update  `keke_w...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update  `keke_w...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update  `keke_w...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\realname\admin\list.php(104): Keke_db_query->execute()
#4 [internal function]: Control_auth_realname_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_realname_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 16:34:12 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:12 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:13 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
2012-12-07 16:34:13 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:14 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:14 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:15 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
2012-12-07 16:34:15 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:16 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:16 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:16 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
2012-12-07 16:34:16 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:23 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:23 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:24 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
2012-12-07 16:34:24 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:24 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
2012-12-07 16:34:24 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:44 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
2012-12-07 16:34:44 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:50 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:50 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:51 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
2012-12-07 16:34:51 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:53 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:53 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:54 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:54 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:54 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
2012-12-07 16:34:54 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:55 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:34:55 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:34:56 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
2012-12-07 16:34:56 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\base.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:36:00 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
2012-12-07 16:36:00 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\shop\order.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 16:36:57 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\task\list.php [ 8 ]
2012-12-07 16:36:57 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\task\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 17:01:52 --- ERROR: Keke_exception [ 1146 ]: Table 'kppw_google.keke_witkey_auth_enterpirse' doesn't exist [ SELECT count(*) FROM `keke_witkey_auth_enterpirse` WHERE licen_num='2323' and auth_status =0 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 17:01:52 --- STRACE: Keke_exception [ 1146 ]: Table 'kppw_google.keke_witkey_auth_enterpirse' doesn't exist [ SELECT count(*) FROM `keke_witkey_auth_enterpirse` WHERE licen_num='2323' and auth_status =0 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('Table 'kppw_goo...', 'SELECT count(*)...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(85): Keke_driver_mysql->execute('SELECT count(*)...')
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(180): Keke_driver_mysql->get_count('SELECT count(*)...', 1)
#3 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(146): Keke_db_select->cache_data('SELECT count(*)...', Object(Keke_driver_mysql))
#4 D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php(118): Keke_db_select->execute()
#5 D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php(104): Control_user_account_auth->check_enter('2323')
#6 [internal function]: Control_user_account_auth->action_enter_save()
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_auth))
#8 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#9 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#10 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#11 {main}
2012-12-07 17:02:55 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '232323,2323,data/uploads/2012/12/07/967350c1b0bf25ee6.jpg,data/uploads/2012/12/0' at line 4 [ replace into  `keke_witkey_auth_enterprise` 
(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)
VALUES
(5,test4,2323,data/uploads/2012/12/07/456050c1b0bf25629.jpg,1354870975.0995,0,,232323,2323,data/uploads/2012/12/07/967350c1b0bf25ee6.jpg,data/uploads/2012/12/07/123050c1b0bf2673b.png) ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 17:02:55 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '232323,2323,data/uploads/2012/12/07/967350c1b0bf25ee6.jpg,data/uploads/2012/12/0' at line 4 [ replace into  `keke_witkey_auth_enterprise` 
(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)
VALUES
(5,test4,2323,data/uploads/2012/12/07/456050c1b0bf25629.jpg,1354870975.0995,0,,232323,2323,data/uploads/2012/12/07/967350c1b0bf25ee6.jpg,data/uploads/2012/12/07/123050c1b0bf2673b.png) ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'replace into  `...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('replace into  `...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('replace into  `...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php(109): Keke_db_query->execute()
#4 [internal function]: Control_user_account_auth->action_enter_save()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_auth))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 17:26:13 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\task\list.php [ 8 ]
2012-12-07 17:26:13 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_lang::loadlang() ~ D:\KKserv\wwwroot\kppw_google\control\task\list.php [ 8 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-07 17:28:13 --- ERROR: Keke_exception [ 1136 ]: Column count doesn't match value count at row 1 [ replace into  `keke_witkey_auth_enterprise` 
(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)
VALUES
('5','test4','','','1354872493.1476',0,'','','','','') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 17:28:13 --- STRACE: Keke_exception [ 1136 ]: Column count doesn't match value count at row 1 [ replace into  `keke_witkey_auth_enterprise` 
(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)
VALUES
('5','test4','','','1354872493.1476',0,'','','','','') ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('Column count do...', 'replace into  `...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('replace into  `...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('replace into  `...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\auth.php(109): Keke_db_query->execute()
#4 [internal function]: Control_user_account_auth->action_enter_save()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_auth))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 18:03:38 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 18:03:38 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\enterprise\admin\list.php(91): Keke_db_query->execute()
#4 [internal function]: Control_auth_enterprise_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_enterprise_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 18:03:43 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 18:03:43 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\enterprise\admin\list.php(91): Keke_db_query->execute()
#4 [internal function]: Control_auth_enterprise_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_enterprise_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 18:04:41 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='tewewe' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 18:04:41 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='tewewe' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\enterprise\admin\list.php(91): Keke_db_query->execute()
#4 [internal function]: Control_auth_enterprise_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_enterprise_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-07 18:04:55 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='wewewe' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-07 18:04:55 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'c.enterprise = 0 where a.uid = '5'' at line 6 [ update `keke_witkey_auth_enterprise` as a 
left join keke_witkey_member_auth as c
on a.uid = c.uid
set a.auth_status = 0,
a.mem='wewewe' 
c.enterprise = 0 where a.uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\auth\enterprise\admin\list.php(91): Keke_db_query->execute()
#4 [internal function]: Control_auth_enterprise_admin_list->action_no_pass()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_auth_enterprise_admin_list))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}