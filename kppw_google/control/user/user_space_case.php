<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8下午06:42:39
 */


$shows = array("list","add");
in_array($show,$shows) or $show="list";
switch ($show){
	case "add":
		$indus_arr = Keke::get_indus_by_index ( 1 ); //行业索引分类列表
		$indus_p_arr=$Keke->_indus_p_arr;//顶级行业
		$indus_c_arr=$Keke->_indus_c_arr;//子集行业
		
		if($sbt_action){
			$case_obj=keke_table_class::get_instance("witkey_shop_case");//案例实例
			$conf['start_time']=strtotime($conf['start_time']);
			$conf['end_time']=strtotime($conf['end_time']);
			$conf['shop_id']  =$shop_info['shop_id'];
			if($_FILES['case_pic']['name']){
				$case_pic = keke_file_class::upload_file('case_pic');
				$case_pic&&$conf['case_pic']=$case_pic;
			}
			$res=$case_obj->save($conf,$pk);
			$res and Keke::show_msg($_lang['case_operate_success'],$ac_url."&show=list#userCenter",3,'','success') or Keke::show_msg($_lang['case_operate_fail'],$ac_url."&show=add&case_id=$case_id#userCenter",3,'','warning');
		}else{
			$case_id and $case_info=Dbfactory::get_one(sprintf(" select * from %switkey_shop_case where case_id='%d'",TABLEPRE,$case_id));
			//自定义分类列表
// 			$cate_list=Dbfactory::query(sprintf(" select * from %switkey_shop_cate where shop_id='%d'",TABLEPRE,$shop_info['shop_id']));//被干掉了
		}
		switch ($ac){
			case "show_indus":
				$str_html="<option value=''>".$_lang['please_select']."</option>";
				if ($indus_pid && $indus_arr [$indus_pid])
					foreach ($indus_arr [$indus_pid] as $v) {
						isset($indus_id)&&$indus_id==$v['indus_id'] and $selected=" selected " or $selected="";
						$str_html .="<option value='".$v['indus_id']."' ".$selected.">".$v['indus_name']."</option>";
					}
				
				echo $str_html;
				die ();
				break;
			case "show_service":
				$service_list=Dbfactory::query(sprintf(" select * from %switkey_service where shop_id='%d'",TABLEPRE,$shop_info['shop_id']));
				$str_html="<option value=''>".$_lang['please_select']."</option>";
				foreach ($service_list as $v) {
					$case_info['service_id']==$v['service_id'] and $selected=" selected " or $selected="";
					$str_html .="<option value='".$v['service_id']."' ".$selected.">".strip_tags($v['title'])."</option>";
				}
			
				echo $str_html;
				die ();
				break;
		}
		break;
	case "list":
		if($ac=='del'){//删除
			$res=Dbfactory::execute(sprintf(" delete from %switkey_shop_case where case_id='%d'",TABLEPRE,$case_id));
			$res and Keke::echojson($_lang['delete_success'],"1") or Keke::echojson($_lang['delete_fail'],"0");
			die();
		}else{
			$indus_c_arr=$Keke->_indus_c_arr;//子集行业列表
			$case_obj=new Keke_witkey_shop_case_class();
			$page_obj=$Keke->_page_obj;
			$where=" shop_id='{$shop_info['shop_id']}' order by on_time desc ";
			intval($page) or $page='1';
			intval($page_size) or $page_size='4';
			$url=$ac_url."&show=list&page_size=$page_size&page=$page";
			/**分页**/
			$case_obj->setWhere($where);
			$count=intval($case_obj->count_keke_witkey_shop_case());
			$pages=$page_obj->getPages($count, $page_size, $page, $url,'#userCenter');
			/**案例信息**/
			$case_obj->setWhere($where.$pages['where']);
			$case_list=$case_obj->query_keke_witkey_shop_case();
		}
		break;
}
require keke_tpl_class::template ("user/" . $do ."_".$op. "_" . $opp );
