<?php	defined ( 'IN_KEKE' ) or exit('Access Denied');
 /**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-08下午02:57:33
 */

$ops = array('inbox','output','send','views','del','mulit_del','mulit_views');
in_array($op,$ops) or $op='inbox';
$opps= array('system','inbox');
 $msg_obj = new keke_table_class('witkey_msg');

$sub_nav=array(
			array("send"=>array( $_lang['write_message'],"doc-edit")),
			array("inbox"=>array( $_lang['inbox'],"contact-card"),
			   	"output"=>array( $_lang['outbox'],"cc")));  
$msg_type = $msg_type?$msg_type:"system";
$op=='output'&&$msg_type='output';
$op=='send'&&$msg_type='write';
//系统消息
$sql = "select * from ".TABLEPRE."witkey_msg where ";
$where  = "1=1 "; 
$w1 =$where." and uid<1 and to_uid=".intval($uid);
$count_system = Dbfactory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where ".$w1);
$w2 =$where." and uid = ".intval($uid)." and msg_status<1";
$count_output = Dbfactory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where ".$w2);
$w3 = $where." and to_uid = ".intval($uid)." and uid>0";
$count_accept =  Dbfactory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where ".$w3);
switch ($msg_type){ 
	case "system"://系统消息
			$where .=" and uid<1 and to_uid=".intval($uid);
		break;
	case "output"://已发短信
			$where .=" and msg_status=0 and uid = ".intval($uid);
		break;
	
	case "accept"://已收短信
			$where .=" and to_uid = ".intval($uid)." and uid>0";
		break;
		 
	case "write"://写短信
			require 'user_message_send.php';
			die();
		break;
		 
}

$k_where = $where;
//查询
$where .= " order by msg_id desc ";
$url = "index.php?do=$do&view=$view&op=$op&msg_type=$msg_type";
$page = $page ? $page : 1;
$count = Dbfactory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where ".$where);
$pages = $Keke->_page_obj->getPages ( $count, 10, $page, $url );
$data = Dbfactory::query($sql.$where.$pages[where]);
  

if($op=='mulit_del' or $op=='mulit_views'){
	$msg_id =  $ckb;
}

switch ($op) {
	case 'mulit_del':
	case 'del':  //删除和批量删除
		if($msg_type=='system'||$msg_type=='accept'){ 
			if($msg_id){ 
				$res = $msg_obj->del("msg_id",$msg_id);
			}else{
			   Keke::show_msg($_lang['operate_tips'],"index.php?do=$do&view=$view&msg_type=$msg_type",1,"没有选择操作的项","alert_error");
			}
		}else{ 	
			is_array($msg_id) and $msg_id = implode(",", $msg_id); 
			$res = Dbfactory::execute("update ".TABLEPRE."witkey_msg set msg_status=2 where msg_id in ($msg_id)");//改变短信状态值 
		}  
		Keke::show_msg($_lang['operate_tips'],"index.php?do=$do&view=$view&msg_type=$msg_type",1,"删除成功","alert_right");

	break;
	case 'mulit_views':
		if($msg_id){
			is_array($msg_id) and $msg_id = implode(",", $msg_id); 
			$msg_data = Dbfactory::query("select * from ".TABLEPRE."witkey_msg where msg_id in ($msg_id)");
			foreach ($msg_data as $v) {
				if($uid==$v['to_uid']&&$v['view_status']<1){
					Dbfactory::execute("update ".TABLEPRE."witkey_msg set view_status=1 where msg_id = ".intval($v['msg_id']));
				}
			}
		}else{
		 	Keke::show_msg($_lang['operate_tips'],"index.php?do=$do&view=$view&msg_type=$msg_type",1,"没有选择操作的项","alert_error");
		}
		
		Keke::show_msg($_lang['operate_tips'],"index.php?do=$do&view=$view&msg_type=$msg_type",1,$_lang['biaoji_success'],"alert_right");
	break;
	case "views"://查看
		
		$msg_id and $msg  = $msg_obj->get_table_info("msg_id", $msg_id);	
		if($uid==$msg['to_uid']&&$msg['view_status']<1){
			Dbfactory::execute("update ".TABLEPRE."witkey_msg set view_status=1 where msg_id = ".intval($msg_id));
		}
		$next = Dbfactory::get_one($sql.$k_where.' and msg_id<'.$msg_id.' order by msg_id desc limit 0,1');
		$pre  = Dbfactory::get_one($sql.$k_where.' and msg_id>'.$msg_id.' order by msg_id asc limit 0,1');
		require keke_tpl_class::template ( "user/user_message_view");die();
	
		break; 
}
 

if (isset ( $check_username ) && ! empty ( $check_username )) { 
	$res =  keke_user_class::get_user_info($check_username,1);	  
	if($res){
		echo true;
	}else{
		echo $_lang['username_not_exist'];
	} 
	die ();
}

require keke_tpl_class::template ( "user/" . $do . "_".$view."_system");