<?php



public function config_out($element){
	$main_url = $this->out_url();
	$config_url = "$main_url"."config.php";
	echo $config_url;
	require($config_url);
	global $config;
	return $config[$element];
}







?>