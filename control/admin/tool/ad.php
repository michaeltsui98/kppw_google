<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * ��̨���λ����
 * 
 * @copyright keke-tech
 * @author ����
 * @version 3.0

 */
class Control_admin_tool_ad extends Control_admin {
	/**
	 * ����б�
	 */
	function action_index() { 
		$fields = '`ad_id`,`target_id`,`ad_type`,`ad_name`,`ad_file`,`ad_content`,`ad_url`,`end_time`,`listorder`,`width`,`height`';		
		$query_fields = array (	'ad_id' => '���ID',	'ad_name' => '�������'); 
 	
		$base_uri = BASE_URL . "/index.php/admin/tool_ad";
		// ɾ��uri��del�ǹ̶���
		
		$del_uri = $base_uri . "/del";
		$add_uri = $base_uri . "/add";
		
		// �޸Ĺ��λ״̬��URI
		$change_uri = $base_uri . "/changestates";
		
		
		$targets = DB::select('target_id,name')->from('witkey_ad_target')->execute();
		
		$targets = Arr::get_arr_by_key($targets, 'target_id');
		 
		$this->_default_ord_field = 'ad_id';
		
		extract ( $this->get_url ( $base_uri ) );
		
	    //����û��Ǵӹ��λҳ����ת�����ģ���ָ����ѯ����
		if(isset($_GET['target_id'])){
			$target_id = $_GET['target_id'];
			$where .= " and target_id = {$_GET['target_id']}";
		}
		$data_info = Model::factory ( 'witkey_ad' )->get_grid ( $fields, $where, $uri, $order );
		// �б�����
		$ad_list = $data_info ['data'];
		
		// ��ҳ����
		$pages = $data_info ['pages'];
		
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_list' );
	}
	/**
	*��ӡ��޸Ĺ��
	*/
	function action_add() {
		$targets = DB::select('target_id,name')->from('witkey_ad_target')->execute();
		$target_id=$_GET['target_id'];
		$targets = Arr::get_arr_by_key($targets, 'target_id');
		$type = $_GET ['type'];
		$ad_id = $_GET ['ad_id'];
		// �����ֵ���ͽ���༭״̬
		$ad_info = DB::select ()->from ( 'witkey_ad' )->where ( "ad_id = '$ad_id'" )->get_one ()->execute ();
		
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_add' );
	}
 
	/**
	 * ��������Ϣ
	 */
	function action_save() {
		Keke::formcheck ( $_POST ['formhash'] );
		$_POST = Keke_tpl::chars ( $_POST );
		 
		$type = $_POST ['type'];
		
		$array = array (
				'ad_type' => $_POST ['rad_ad_type'],
				'ad_name' => $_POST ['txt_ad_name'],
				'ad_url' => $_POST ['txt_ad_url'],
				'end_time' => strtotime($_POST ['txt_ad_end_time']),
				'listorder' => $_POST ['txt_ad_listorder'],
				'width' => $_POST ['txt_ad_width'],
				'height' => $_POST ['txt_ad_width'],
				'target_id' => $_POST['sel_target_id'],
				'ad_file'=>"",
				'ad_content'=>""
		);
		
		switch ($array['ad_type']){
			case 'code':
			case 'text':
				$array['ad_content']=htmlspecialchars_decode($_POST['txt_ad_content'],3);
				break;
			case 'image':
				$array['ad_file']=$_POST['hdn_img_ad_file'];
				break;
			case 'flash':
				if ($_POST['flash_method']=='url'){
					$array['ad_file']=$_POST['flash_url'];
				}elseif ($_POST['flash_method']=='file'){
					$array['ad_file']=File::upload_file('flash_file','swf|flv');
				}
				break;
		}
		if ($_POST ['hdn_ad_id']) {
			$ad_id = $_POST ['hdn_ad_id'];
			Model::factory ( 'witkey_ad' )->setData ( $array )->setWhere ( "ad_id = '{$_POST['hdn_ad_id']}'" )->update ();
			$this->request->redirect ( "admin/tool_ad/add?ad_id=$ad_id" );
		} else {
			Model::factory ( 'witkey_ad' )->setData ( $array )->create ();
			$this->request->redirect ( 'admin/tool_ad' );
		}
	}
	/**
	 * ɾ�����
	 */
	function action_del() {
		
		
		if ($_GET ['ad_id']) {
			$where = 'ad_id = ' . $_GET ['ad_id'];
		}
		$ad_file =S_ROOT.DB::select('ad_file')->from('witkey_ad')->where($where)->get_count()->execute();
	    if(is_file($ad_file)){
	    	unlink($ad_file);
	    }
		
		echo Model::factory ( 'witkey_ad' )->setWhere ( $where )->del ();
	}
	/**
	 * ���ݹ��������ǰ̨��ʾ��Ӧ�Ĺ������
	 */
	function out($ad_info){
		switch ($ad_info['ad_type']){
			case'image':
				echo "<img width='50' height='25' src=".BASE_URL.'/'.$ad_info['ad_file'].">";
				break;
			case 'text':
				echo "<a href={$ad_info['ad_url']}>txt_code</a>";
				break;
			case 'flash':
				echo File::flash_codeout(BASE_URL.'/'.$ad_info['ad_file'],50,25);
				break;	
			case 'code':
				echo 'script code';
				break;	
		}
	}
	/**
	 * ajaxɾ��ADͼƬ
	 */
	static function action_del_img(){
		//���pk��ֵ����ɾ���ļ����е�art_pic
		if($_GET['pk']){
			Dbfactory::execute(" update ".TABLEPRE."witkey_ad set ad_file ='' where ad_id = ".intval($_GET['pk']));
		}
		//û��fid�Ͳ���fid,û��fid����ɾ���ļ�,���ڰ�ȫ����
		if(!intval($_GET['fid'])){
			$fid = Dbfactory::get_count(" select file_id from ".TABLEPRE."witkey_file where save_name = '.{$_GET['filepath']}.'");
		}else{
			$fid = $_GET['fid'];
		}
		//ɾ���ļ�
		File::del_att_file($fid, $_GET['filepath']);
		Keke::echojson ( '', '1' );
	}
	/**
	 * ��ѯ���λʣ������
	 */
	function action_get_targetnum(){
		$target_id = (int)$_GET['target_id'];
		$sql ="SELECT a.ad_num - count(b.ad_id) \n".
				"FROM `:keke_witkey_ad_target` a \n".
				"LEFT JOIN :keke_witkey_ad b \n".
				"on a.target_id = b.target_id \n".
				"where a.target_id = $target_id \n".
				"GROUP BY a.target_id ";
		echo DB::query($sql)->tablepre(':keke_')->get_count()->execute();
	}
}
	