<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-26早上11:49:00
 */
class Control_index extends Control_front{
	
	function action_index(){
		global $Keke,$_K,$_lang;
		
		if (Keke::$_task_open) {
			$final_task = Sys_indus::get_classify_indus();
			/**
			 * 首页任务中标额统计
			*/
			$task_in = Dbfactory::get_one ( sprintf ( " select sum(fina_cash) cash from %switkey_finance where fina_action='task_bid' and fina_type='in' ", TABLEPRE ), 1, 600 ); // 任务
			$task_in = str_pad ( number_format ( $task_in ['cash'], 2, ".", "," ), 10, 0, STR_PAD_LEFT );
			/**
			 * 首页任务发布量统计
			*/
			$task_count = Dbfactory::get_one ( sprintf ( " select count(task_id) count from %switkey_task", TABLEPRE ), 1, 600 ); // 数量统计
			$task_count = str_pad ( intval ( $task_count ['count'] ), 10, 0, STR_PAD_LEFT );
			/**
			 * 推荐任务
			*/
			$task_recomm_3 = Dbfactory::query ( sprintf ( " select task_id,uid,username,task_title,task_cash,model_id,view_num,focus_num,work_num,task_cash_coverage from %switkey_task where is_top='1' and task_status='2' order by start_time desc limit 0,3", TABLEPRE ), 1, 600 );
		
			$sql = " select task_id,task_title,task_cash,view_num,focus_num,work_num,task_cash_coverage
		 from %switkey_task  where is_top='1' and (task_status='2' or task_status ='3' or task_status ='4' or task_status ='5' or task_status ='6')
		  order by start_time desc limit 3,33";
			$recomm_task = Dbfactory::query ( sprintf ( $sql, TABLEPRE ), true, 3600 );
		}
		if (Keke::$_shop_open) {
			$final_shop = Sys_indus::get_classify_indus('shop');
			/**
			 * 首页服务额统计
			*/
			$service_in = Dbfactory::get_one ( sprintf ( " select sum(fina_cash) cash from %switkey_finance where fina_action='sale_service' and fina_type='in'", TABLEPRE ), 1, 600 ); // 商城
			$service_in = str_pad ( number_format ( $service_in ['cash'], 2, ".", "," ), 10, 0, STR_PAD_LEFT );
		
			/**
			 * 首页服务发布量统计
			*/
			$service_count = Dbfactory::get_one ( sprintf ( " select count(service_id) count from %switkey_service where service_status='2'", TABLEPRE ), 1, 600 ); // 数量统计
			$service_count = str_pad ( intval ( $service_count ['count'] ), 10, 0, STR_PAD_LEFT );
			/**
			 *推荐用户 top 3
			*/
			$top_s_3 = Dbfactory::query ( sprintf ( "select a.username,a.uid,a.indus_id,a.indus_pid,a.seller_good_num,a.seller_total_num,b.shop_name from %switkey_shop b "
					." left join %switkey_space a on a.uid=b.uid  where a.recommend=1 and IFNULL(b.is_close,0)=0 order by a.uid desc limit 0,3", TABLEPRE,TABLEPRE ), 1, 600 );
			/**
			 * 推荐商品
			*/
			$range = range ( 0, 11 );
			$range2 = range(0,17);
			$recomm_service = Dbfactory::query ( sprintf ( "select service_id,price,unite_price,pic,ad_pic,title from %switkey_service where is_top='1' and service_status='2' order by on_time desc limit 0,12", TABLEPRE ), 1, 600 );
		}
	 
		
		/**
		 * 首页最近二周注册用户统计
		 */
		$register = Dbfactory::get_one ( sprintf ( " select count(uid) count from %switkey_member ", TABLEPRE ), 1, 600 ); // 注册用户
		$register = str_pad ( intval ( $register ['count'] ), 10, 0, STR_PAD_LEFT );
		
		/**
		 * 首页认证用户统计
		*/
		//$all_auth = Dbfactory::get_one ( sprintf ( " select count(record_id) count from %switkey_auth_record where auth_status='1'", TABLEPRE ), 1, 600 ); // 认证用户
		$all_auth = str_pad ( intval ( $all_auth ['count'] ), 10, 0, STR_PAD_LEFT );
		/**
		 * 网站公告
		*/
		
		$bulletin_arr = Dbfactory::query(sprintf("select art_id,art_title,listorder,is_recommend,pub_time from %switkey_article where cat_type='bulletin' order by is_recommend desc, listorder asc, pub_time desc limit 0,4",TABLEPRE));
		/**
		 * 首页feed
		*/
		$feed_list = Dbfactory::query ( "select uid,username,title,feed_time from " . TABLEPRE . "witkey_feed order by feed_time desc limit 0,4", 1, 3600 );
		$mode_list = Keke::$_model_list;
		$cash_coverage = Sys_misc::get_cash_cove('',true) ;
		/**
		 * 新闻
		*/
		$news_list = Keke::get_table_data ( "art_id,art_title,listorder,is_recommend,art_pic,content,pub_time", "witkey_article", " cat_type='article' ", "is_recommend desc, listorder asc, pub_time desc", "", "10", "", 3600 );
		
		/**
		 * 首页案例
		*/
		
		if (Keke::$_task_open&&Keke::$_shop_open) {
			$case_list = Keke::get_table_data ( "case_id,obj_id,obj_type,case_img,case_title,case_price", "witkey_case", "", "", "", "7", "", 3600 );
		}elseif(Keke::$_task_open&&!Keke::$_shop_open){
			$case_list = Keke::get_table_data ( "case_id,obj_id,obj_type,case_img,case_title,case_price", "witkey_case", " obj_type='task' ", "", "", "7", "", 3600 );
		}elseif(!Keke::$_task_open&&Keke::$_shop_open){
			$case_list = Keke::get_table_data ( "case_id,obj_id,obj_type,case_img,case_title,case_price", "witkey_case", " obj_type='service' ", "", "", "7", "", 3600 );
		}

		/**
		 * 首页人才
		 */
		$talent_list = Dbfactory::query ( sprintf ( " select uid,username from %switkey_space where status!=2 order by reg_time desc limit 0,16", TABLEPRE ), 1, 600 );
		// var_dump($talent_list);
		/**
		 * 收入排行
		*/
		$income_rank = Dbfactory::query ( sprintf ( " select sum(a.fina_cash) as cash,a.uid,a.username from %switkey_finance a left join %switkey_space b on a.uid=b.uid where a.fina_type='in' and ( a.fina_action in('task_bid','sale_service') or INSTR(a.fina_action,'prom_')>0) and b.status!=2 group by a.uid order by cash desc limit 0,5 ", TABLEPRE, TABLEPRE ), 1, 600 ); // 收入排行
		
		
		
		
		$_K['page_title'] = Keke::$_sys_config['seo_title'];
		
 
		/** 网站地图*/
		$link_task = Keke::$_model_list;
		
		//资讯中心
		$link_news = Keke::get_table_data ( "art_cat_id,cat_name", "witkey_article_category", "art_cat_pid=0 and cat_type='article'", " listorder asc", "", "5", "", 3600 );
		
		//关于网站
		$link_about = Keke::get_table_data ( "art_id,art_title,listorder,is_recommend,art_pic,content,pub_time", "witkey_article", " cat_type='about' ", "is_recommend desc, listorder asc, pub_time desc", "", "10", "", 3600 );
		//帮助中心
		$link_help = Keke::get_table_data ( "art_cat_id,cat_name", "witkey_article_category", "art_cat_pid=0 and cat_type='help'", " listorder asc", "", "5", "", 3600 );
		
		$flink = Keke::get_table_data("link_id,link_name,link_url","witkey_link",""," link_id asc","","","",3600);
		/* $query_sql = Database::instance()->get_query_list();
		print_r($query_sql); */
		require Keke_tpl::template ( 'index' );
	}
	//建议
	function action_report($param) {
	     global $_K,$_lang;
			$transname = Sys_report::get_transrights_name($_GET['type']);
			$title=$transname.$_lang['submit'];
			require Keke_tpl::template("report");
	}
	//保存建议
	function action_report_save(){
		global $_K,$_lang;
		extract($_POST);
		if (CHARSET == 'gbk') {
			$desc = Keke::utftogbk ( $tar_content );
		}
		$report_obj = new Keke_witkey_report ();
		$report_obj->setObj ( $obj );
		$report_obj->setUid ( $uid );
		$report_obj->setUsername ( $username );
		$report_obj->setOn_time ( time () );
		$report_obj->setReport_desc ( $desc );
		$report_obj->setReport_type ( 3 );
		$report_obj->setFront_status ( $front_status );
		$report_obj->setReport_file ( $file_name );
		$report_obj->setReport_status ( 1 );
		$report_obj->setIs_hide ( $is_hide );
		$report_id = $report_obj->create_keke_witkey_report ();
		if ($report_id) {
			Keke::keke_show_msg ( '', $transname . $_lang ['submit_success_wait_website_process'], "", 'json' );
		} else {
			Keke::keke_show_msg ( '', $transname . $_lang ['submit_fail'], "error", 'json' );
		}
	}
	function action_ajax(){
		$ajax = $this->request->param('id');
		
			switch ($ajax) {
				case "task" :
					/**
					 * 最新任务
					 */
					$sql2 = " select task_id,task_title,task_cash,view_num,focus_num,work_num,task_cash_coverage
		 					  from %switkey_task  where  (task_status='2' or task_status ='3' )
		 					  order by start_time desc limit 0,42";
					$task_lastest = Dbfactory::query ( sprintf ( $sql2, TABLEPRE ), true, 3600 );
					require Keke_tpl::template ( "ajax/index" );
					die ();
					break;
				case "shop" :
					/**
					 * 最新商品
					 */
					$service_lastes = Dbfactory::query ( sprintf ( "select service_id,pic,ad_pic,title,unite_price,price from %switkey_service where   service_status='2' order by on_time desc limit 0,18", TABLEPRE ), 1, 600 );
					require Keke_tpl::template ( "ajax/index" );
					die ();
					break;
				case 'indus_index' :
					/**
					 * 商城行业请求
					 */
					require Keke_tpl::template ( "ajax/ajax_indus" );
					die ();
					break;
				case 'bid_notice' :
					$dynamic_arr = Keke::get_feed ( "feedtype='work_accept'", "feed_time desc", 4 ); // 动态信息
					require Keke_tpl::template ( "ajax/index" );
					die ();
					break;
				case 'withdraw' :
					$withdraw_arr = Dbfactory::query(sprintf("select * from %switkey_withdraw where withdraw_status=2 order by process_time desc limit 0,4",TABLEPRE));
					require Keke_tpl::template ( "ajax/index" );
					die ();
					break;
		}
	}
	function get_art($cat_id) {
		$sql = "select a.art_id,a.art_title from " . TABLEPRE . "witkey_article a left join " . TABLEPRE . "witkey_article_category b  on a.art_cat_id = b.art_cat_id
	 					where a.art_cat_id = $cat_id  or b.art_cat_pid like '%{ $cat_id }%' order by a.pub_time desc limit 4";
		return Dbfactory::query ( $sql, 0, 600 );
	}
}