<?php

class amr extends a_controller{

public function __construct(){
	parent::__construct();
	
	
	$a = $this->config_out('static');
	$this->modify_config_in('static','0','1');
	
	$this->page('home');
	$index = new index;
	if(@$_POST['submit']){
	$index->post_config("$_POST[main_folder]","$_POST[theme]","$_POST[cache]","$_POST[helping_errors]","$_POST[static]");
		}

	}
}

$qm = new amr();


?>