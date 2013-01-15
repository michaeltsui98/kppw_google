<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * ��������
 * @copyright keke-tech
 * @author shang
 * @version v 2.0
 * 2010-5-19����0:54:00
 */

class Control_admin_tool_file extends Control_admin{
	
	function action_index(){
		//����ȫ�ֱ��������԰���ֻҪ����ģ�壬����Ǳ���Ҫ����.��
		global $_K,$_lang;
		
		//Ҫ��ʾ���ֶ�,��SQl��SELECTҪ�õ����ֶ�
		$fields = ' `file_id`,`obj_type`,`obj_id`,`file_name`,`save_name`,`on_time` ';
		//Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
		$query_fields = array('file_id'=>$_lang['id'],'file_name'=>$_lang['name'],'on_time'=>$_lang['time']);
		//�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
		$count = intval($_GET['count']);
		//tool������һ��Ŀ¼������û�ж���toolΪĿ¼��·��,����������Ʋ���ļ���too_file So���ﲻ��дΪtool/file
		$base_uri = BASE_URL."/index.php/admin/tool_file";
		
		//��ӱ༭��uri,add���action �ǹ̶���
		$add_uri =  $base_uri.'/add';
		//ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
		$del_uri = $base_uri.'/del';
		//Ĭ�������ֶΣ����ﰴʱ�併��
		$this->_default_ord_field = 'on_time';
		//����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
		extract($this->get_url($base_uri));
		//��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
		$data_info = Model::factory('witkey_file')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//�б�����
		$list_arr = $data_info['data'];
		//��ҳ����
		$pages = $data_info['pages'];
		$file_type_arr = Keke_global::get_file_type();
		require Keke_tpl::template('control/admin/tpl/tool/file');
	}
	/**
	 * ������ɾ����action ��Ҫ�Ǵ���Ҫ����ɾ��
	 * �����ɾ����
	 * ��أ�ɾ��action������ͳһdel,��Ҫ��Ϊʲô
	 * ����ɾ����������������ֵ�Ϳ���ɾ����
	 * ����ɾ���ģ���ǰ��jsƴ�Ӻõ�ids��������ֵ.js ֻ��ids ��Ӵ����Ҫд����������
	 *
	 */
	function action_del(){
		//ɾ������,�����file_id ����ģ���ϵ������������е�
		if($_GET['file_id']){
			$where = 'file_id = '.$_GET['file_id'];
			//ɾ������,���������ͳһΪidsӴ����
		}elseif($_GET['ids']){
			$where = 'file_id in ('.$_GET['ids'].')';
		}
		//Ҫɾ�����ļ���Ϣ
		$files_info = $this->get_file_info($where);
		//�ļ�·��
		$file_path = S_ROOT . 'data/uploads/';
		//������һ���ļ����Ƕ����ѭ��ɾ���������
		foreach ($files_info as $v){
			if(is_file($file_path.$v['save_name'])){
				//�ļ����ڣ���ɾ��
				unlink($file_path.$v['save_name']);
			}
		}
		//���ִ��ɾ�����Ӱ��������ģ���ϵ�js �������ֵ���ж��Ƿ�����tr��ǩ��
		//ע���в��ܴ���������ȥע�͵Ĺ���ʧЧ,��ʹ�Ĺ��߰�!
		echo  Model::factory('witkey_file')->setWhere($where)->del();
	}
	/**
	 * �����û��Ҫ�༭����ӵ�ҵ�񣬹�action_addû��ʵ��
	 */
	/**
	 * ��ȡָ���������ļ���Ϣ
	 * @param String $where Sql �е�where
	 */
	function get_file_info($where){
		return DB::select('save_name')->from('witkey_file')->where($where)->execute();
	}
}//end