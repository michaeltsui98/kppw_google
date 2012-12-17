<?php defined('IN_KEKE') or die('Access Denied'); ?>


2012-12-12 10:17:27 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 10:17:27 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 10:17:27 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 11:14:46 --- ERROR: ErrorException [ 2 ]: array_map() [function.array-map]: Argument #5 should be an array ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 52 ]
2012-12-12 11:14:46 --- STRACE: ErrorException [ 2 ]: array_map() [function.array-map]: Argument #5 should be an array ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 52 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'array_map() [<a...', 'D:\KKserv\wwwro...', 52, Array)
#1 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(52): array_map(NULL, Array, Array, Array, NULL)
#2 [internal function]: Control_user_account_detail->action_skill_save()
#3 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#4 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#6 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#7 {main}
2012-12-12 11:19:51 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 11:19:51 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 11:19:51 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 11:35:19 --- ERROR: Keke_exception [ 0 ]: The requested URL user/user/account_detail/skill_del was not found on this server. Control_user_user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-12 11:35:19 --- STRACE: Keke_exception [ 0 ]: The requested URL user/user/account_detail/skill_del was not found on this server. Control_user_user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-12 11:35:46 --- ERROR: Keke_exception [ 0 ]: The requested URL user/user/account_detail/skill_del was not found on this server. Control_user_user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-12 11:35:46 --- STRACE: Keke_exception [ 0 ]: The requested URL user/user/account_detail/skill_del was not found on this server. Control_user_user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-12 13:30:08 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 13:30:08 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 13:30:08 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 13:48:11 --- ERROR: ErrorException [ 2 ]: unlink(D:\KKserv\wwwroot\kppw_google\) [function.unlink]: Permission denied ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 74 ]
2012-12-12 13:48:11 --- STRACE: ErrorException [ 2 ]: unlink(D:\KKserv\wwwroot\kppw_google\) [function.unlink]: Permission denied ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 74 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'unlink(D:\KKser...', 'D:\KKserv\wwwro...', 74, Array)
#1 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(74): unlink('D:\KKserv\wwwro...')
#2 [internal function]: Control_user_account_detail->action_skill_del()
#3 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#4 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#6 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#7 {main}
2012-12-12 14:43:18 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 14:43:18 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 14:43:18 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 15:06:10 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '{' ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 57 ]
2012-12-12 15:06:10 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '{' ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 57 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-12 15:12:31 --- ERROR: ErrorException [ 2 ]: unlink(D:\KKserv\wwwroot\kppw_google\) [function.unlink]: Permission denied ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 84 ]
2012-12-12 15:12:31 --- STRACE: ErrorException [ 2 ]: unlink(D:\KKserv\wwwroot\kppw_google\) [function.unlink]: Permission denied ~ D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php [ 84 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'unlink(D:\KKser...', 'D:\KKserv\wwwro...', 84, Array)
#1 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(84): unlink('D:\KKserv\wwwro...')
#2 [internal function]: Control_user_account_detail->action_skill_del()
#3 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#4 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#6 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#7 {main}
2012-12-12 15:40:48 --- ERROR: ErrorException [ 1 ]: Call to undefined method Keke_valid::not_emtpy() ~ D:\KKserv\wwwroot\kppw_google\data\tpl_c\tpl_default_user_account_skill_tag.php [ 188 ]
2012-12-12 15:40:48 --- STRACE: ErrorException [ 1 ]: Call to undefined method Keke_valid::not_emtpy() ~ D:\KKserv\wwwroot\kppw_google\data\tpl_c\tpl_default_user_account_skill_tag.php [ 188 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-12 15:43:18 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 15:43:18 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 15:43:18 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 15:55:09 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 15:55:09 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(118): Keke_db_query->execute()
#4 [internal function]: Control_user_account_detail->action_tag_del()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-12 15:55:11 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 15:55:11 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(118): Keke_db_query->execute()
#4 [internal function]: Control_user_account_detail->action_tag_del()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-12 15:55:27 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 15:55:27 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''pptÉè¼Æ',','') )
,skill_ids = (replace(skill_ids,''pptÉè¼Æ'',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(118): Keke_db_query->execute()
#4 [internal function]: Control_user_account_detail->action_tag_del()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-12 16:22:57 --- ERROR: Keke_exception [ 1054 ]: Unknown column 'indus_is' in 'where clause' [ SELECT `skill_name` FROM `keke_witkey_skill` WHERE indus_is=29 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 16:22:57 --- STRACE: Keke_exception [ 1054 ]: Unknown column 'indus_is' in 'where clause' [ SELECT `skill_name` FROM `keke_witkey_skill` WHERE indus_is=29 ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('Unknown column ...', 'SELECT `skill_n...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('SELECT `skill_n...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(180): Keke_driver_mysql->query('SELECT `skill_n...', 1)
#3 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(146): Keke_db_select->cache_data('SELECT `skill_n...', Object(Keke_driver_mysql))
#4 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(108): Keke_db_select->execute()
#5 [internal function]: Control_user_account_detail->action_get_tag()
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#9 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#10 {main}
2012-12-12 16:55:33 --- DEBUG: Ã¿ÈÕÈÎÎñ×´Ì¬¸üÐÂ
2012-12-12 16:55:33 --- DEBUG: Control_task_mreward_cronrun
2012-12-12 16:55:33 --- DEBUG: Control_task_sreward_cronrun
2012-12-12 17:38:19 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '),','') )
,skill_ids = (replace(skill_ids,'')',''))
 where uid = '5'' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''),','') )
,skill_ids = (replace(skill_ids,'')',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 17:38:19 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '),','') )
,skill_ids = (replace(skill_ids,'')',''))
 where uid = '5'' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,''),','') )
,skill_ids = (replace(skill_ids,'')',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(150): Keke_db_query->execute()
#4 [internal function]: Control_user_account_detail->action_tag_del()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}
2012-12-12 17:38:25 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'XhtmluiÉè¼Æ'),','') )
,skill_ids = (replace(skill_ids,'CONCAT(skill_ids'XhtmluiÉ' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,'CONCAT(skill_ids'XhtmluiÉè¼Æ'),','') )
,skill_ids = (replace(skill_ids,'CONCAT(skill_ids'XhtmluiÉè¼Æ')',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-12-12 17:38:25 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'XhtmluiÉè¼Æ'),','') )
,skill_ids = (replace(skill_ids,'CONCAT(skill_ids'XhtmluiÉ' at line 2 [ update `keke_witkey_space` 
set skill_ids = ( REPLACE(skill_ids,'CONCAT(skill_ids'XhtmluiÉè¼Æ'),','') )
,skill_ids = (replace(skill_ids,'CONCAT(skill_ids'XhtmluiÉè¼Æ')',''))
 where uid = '5' ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'update `keke_wi...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('update `keke_wi...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\query.php(233): Keke_driver_mysql->query('update `keke_wi...', 3)
#3 D:\KKserv\wwwroot\kppw_google\control\user\account\detail.php(150): Keke_db_query->execute()
#4 [internal function]: Control_user_account_detail->action_tag_del()
#5 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_account_detail))
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#9 {main}