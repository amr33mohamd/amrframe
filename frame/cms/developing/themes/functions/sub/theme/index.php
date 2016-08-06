<?php
class theme extends a_controller{

	public function __construct(){
		parent::__construct();
		
		
	}

	public function get_page($page){
		$server = $_SERVER['HTTP_HOST'];
		$main = new main;
		$main_folder = $this->config_out('main_folder');
        
		$main_url = "$server/"."$main_folder/"."$page";
		$main_url = str_replace("//","/", $main_url);
        
http://www.appelsiini.net/projects/jeditable
		include("http://"."$main_url");
	}

	}
?>