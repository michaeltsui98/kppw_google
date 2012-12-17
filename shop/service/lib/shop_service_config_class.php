<?php
	class shop_service_config_class {
		/**
		 * 
		 * 该函数用于设置流程配置数据
		 * @param $conf 流程配置中的配置数据
		 * @param  $model_id 模型id
		 */
		function  set_service_ext_config($conf,$model_id) {
			$ext_config = serialize($conf) ;
			return db_factory::execute(sprintf("update %switkey_model set config ='%s' where model_id='%d' ",TABLEPRE,$ext_config,$model_id));	
		}
		
		/**
		 * 该函数用于获取流程配置数据
		 * 
		 */
		function  get_service_ext_config() {
			 $ext_config = db_factory::get_one(sprintf("select config from %switkey_model where model_id=7",TABLEPRE));
			 return  unserialize($ext_config[config]);
		}
	}