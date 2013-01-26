<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��̨�б�������
 * @author Michael
 * @version 3.0
   2012-10-21
 */
Keke_lang::load_lang_class('list','shop');
abstract class Control_admin_shop_list extends Control_admin{
    
	/**
	 *
	 * @var ����id
	 */
	protected  $_sid ;
	protected  $_base_uri;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->_sid = intval($_GET['sid']);
		$this->_base_uri  = BASE_URL."/index.php/shop/".$this->_model_code."_admin_list";
	}
   
    /**
     * �Ƿ����ɾ�� ��Ʒ
     * ��Ʒû�н��׵Ķ�������ɾ��  status(ok,send,confirm,arbitral),��Щ״̬�Ĳ���ɾ��
     * @return bool
     */
    public function has_del($sid=NULL){
    	if($sid===NULL){
    		$sid  = $this->_sid;
    	}
    	$sql = "SELECT c.order_status FROM `:Pwitkey_service` as a \n".
				"LEFT JOIN :Pwitkey_order_detail as b on a.sid = b.obj_id and b.obj_type = 'service'\n".
				"left join :Pwitkey_order as c on b.order_id = c.order_id\n".
				"where a.sid = :sid ";
    	$status = DB::query($sql)->tablepre(":P")->param(":sid", $sid)->get_count()->execute();
    	$status_arr = array('ok','send','confirm','arbitral');
    	return (bool)!in_array($status,$status_arr);
     
    }
     
    /**
     * ��ȡ��Ʒ��Ϣ
     * @param int $sid
     * @return Ambigous <string, unknown, Ambigous>
     */
    public function get_service_info($sid = NUll){
    	if($sid == NULL){
    		$where = "sid = '$this->_sid'";
    	}else{
    		$where = "sid = '$sid'";
    	}
    	return  DB::select()->from('witkey_service')->where($where)->get_one()->execute();
    }
 
     
    /**
     * ��ȡ����ĸ���
     * @param int $sid
     * @return Ambigous <string, unknown, Ambigous>
     */
    public static  function get_service_file($sid){
    	$where ="obj_type='service' and obj_id = '$sid'";
    	return DB::select()->from('witkey_file')->where($where)->execute();
    }

    /**
     * ɾ��ָ������,Ĭ��ɾ����ǰ����ķ���
     * @return number
     */
    public function del_service($sid = NULL){
    	if($sid===NULL){
    		$sid = $this->_sid;
    	}
    	$where = "sid = '$sid'";
    	
    	//��Ʒ�ĸ���
    	self::del_files_by_service($sid);
    	//Ҫɾ������,�����
    	$sql = "DELETE a,b from :Pwitkey_service as a LEFT JOIN :Pwitkey_comment as b\n".
				"on a.sid = b.obj_id and b.obj_type = 'service' \n".
				"where a.sid = :sid ";
    	
     	return (int)DB::query($sql,Database::DELETE)->param(":sid", $sid)->tablepre(":P")->execute();
    }
    /**
     * ɾ����Ʒ+����ĸ�����+��¼
     * @param int $sid
     */
    public static function del_files_by_service($sid){
    	$files = (array)self::get_task_file($sid);
    	$file_id = array();
    	foreach ($files as $v){
    		$path = S_ROOT.$v['save_name'];
    		if(is_file($path)){
    			unlink($path);
    		}
    		$file_id[] = $v['file_id'];
    	}
    	if(empty($file_id)){
    		return TRUE;
    	}
    	$ids = implode(',', $file_id);
    	$where = " file_id in($ids) ";
    	return DB::delete('witkey_file')->where($where)->execute();
    }
}