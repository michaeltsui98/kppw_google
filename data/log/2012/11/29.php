<?php defined('IN_KEKE') or die('Access Denied'); ?>



2012-11-29 16:41:58 --- DEBUG: 进入后台回调页面
 
2012-11-29 17:11:49 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:11:49 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 17:11:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:11:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 17:11:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:11:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 17:12:26 --- DEBUG: 进入后台回调页面
2012-11-29 17:12:26 --- DEBUG: tewew222
2012-11-29 17:12:26 --- DEBUG: 进入后台notify_id:WE37gwCoFBdU1yPpChoFfQFWJi1XIzWU-Sk1C5bCHgEnayoRXk01cDTljdGWrb7xLMNDXGc8O58TbCayRiRuqprgm1RgUftz
2012-11-29 17:12:28 --- DEBUG: 进入后台notify_id:WE37gwCoFBdU1yPpChoFfQFWJi1XIzWU-Sk1C5bCHgEnayoRXk01cDTljdGWrb7xLMNDXGc8O58TbCayRiRuqprgm1RgUftz
2012-11-29 17:12:28 --- DEBUG: 即时到帐验签ID成功
2012-11-29 17:12:28 --- DEBUG: 即时到帐后台回调成功
2012-11-29 17:12:28 --- DEBUG: <br>------------------------------------------------------<br>http res:200,<br>query req:https://gw.tenpay.com/gateway/simpleverifynotifyid.xml?notify_id=WE37gwCoFBdU1yPpChoFfQFWJi1XIzWU-Sk1C5bCHgEnayoRXk01cDTljdGWrb7xLMNDXGc8O58TbCayRiRuqprgm1RgUftz&amp;partner=1900000113&amp;sign=b3760543eb6faf5e6cfdf7c61cfcc4be<br><br>query res:&lt;?xml version="1.0" encoding="GBK"?&gt;
&lt;root&gt;
  &lt;input_charset&gt;GBK&lt;/input_charset&gt;
  &lt;partner&gt;1900000113&lt;/partner&gt;
  &lt;retcode&gt;0&lt;/retcode&gt;
  &lt;retmsg /&gt;
  &lt;sign&gt;E531EAA40594C007CBDBA3BC068BE51B&lt;/sign&gt;
  &lt;sign_key_index&gt;1&lt;/sign_key_index&gt;
  &lt;sign_type&gt;MD5&lt;/sign_type&gt;
&lt;/root&gt;

<br><br>query reqdebug:notify_id=WE37gwCoFBdU1yPpChoFfQFWJi1XIzWU-Sk1C5bCHgEnayoRXk01cDTljdGWrb7xLMNDXGc8O58TbCayRiRuqprgm1RgUftz&partner=1900000113&key=e82573dc7e6136ba414f2e2affbe39fa => sign:b3760543eb6faf5e6cfdf7c61cfcc4be<br><br>query resdebug:input_charset=GBK&partner=1900000113&retcode=0&sign_key_index=1&sign_type=MD5&key=e82573dc7e6136ba414f2e2affbe39fa => sign:e531eaa40594c007cbdba3bc068be51b tenpaySign:E531EAA40594C007CBDBA3BC068BE51B<br><br>
2012-11-29 17:39:37 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:39:37 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 17:39:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:39:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 17:39:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-11-29 17:39:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/logo.ico was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#3 {main}
2012-11-29 18:05:48 --- ERROR: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by pay_id asc' at line 1 [ SELECT * FROM `keke_witkey_pay_api` WHERE type='online' and status = 1 ORDER BY order by pay_id asc ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
2012-11-29 18:05:48 --- STRACE: Keke_exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by pay_id asc' at line 1 [ SELECT * FROM `keke_witkey_pay_api` WHERE type='online' and status = 1 ORDER BY order by pay_id asc ] ~ D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php [ 296 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(240): Keke_driver_mysql->halt('You have an err...', 'SELECT * FROM `...')
#1 D:\KKserv\wwwroot\kppw_google\class\database\keke\driver\mysql.php(63): Keke_driver_mysql->execute('SELECT * FROM `...', 0)
#2 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(180): Keke_driver_mysql->query('SELECT * FROM `...', 1)
#3 D:\KKserv\wwwroot\kppw_google\class\database\keke\db\select.php(146): Keke_db_select->cache_data('SELECT * FROM `...', Object(Keke_driver_mysql))
#4 D:\KKserv\wwwroot\kppw_google\control\user\finance\recharge.php(27): Keke_db_select->execute()
#5 [internal function]: Control_user_finance_recharge->action_index()
#6 D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php(96): ReflectionMethod->invoke(Object(Control_user_finance_recharge))
#7 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#8 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#9 D:\KKserv\wwwroot\kppw_google\index.php(22): Keke_Request->execute()
#10 {main}