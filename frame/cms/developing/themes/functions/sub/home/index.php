<?php
class index extends a_controller{

	public function __construct(){
		
		
		
	}

	public function post_config($main_folder,$theme,$cache,$helping_errors,$static){
		$p_main_folder = $this->config_out('main_folder');
		$p_theme = $this->config_out('theme');
		$p_cache = $this->config_out('cache');
		$p_helping_errors = $this->config_out('helping_errors');
		$p_static = $this->config_out('static');


		$this->modify_config_in('main_folder',"$main_folder","$p_main_folder");
		$this->modify_config_in('theme',"$theme","$p_theme");
		$this->modify_config_in('cache',"$cache","$p_cache");
		$this->modify_config_in('helping_errors',"$helping_errors","$p_helping_errors");
		$this->modify_config_in('static',"$static","$p_static");
	}

	}

	?>