<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �Ƽ�����ҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_preward_trade extends Sys_task_trade{
    
	/**
	 * @return ���ؼƼ���������״̬
	 */
	public static function task_status() {
		$arr = DB::select()->from('witkey_status')->where("stype='task' and model_code ='preward'")->cached(9999)->execute();
		return Arr::get_arr_by_key($arr, 'sid');
	}
	/**
	 * @return ���ؼƼ����͸��״̬
	 * 
	 */
	public static function work_status() {
		
		$arr = DB::select()->from('witkey_status')->where("stype='work' and model_code ='preward'")->cached(9999)->execute();
		return Arr::get_arr_by_key($arr, 'sid');
		
	}

}