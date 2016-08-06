<?php
session_start();
ob_start();






require_once('config.php');

require_once('frame/controllers/index.php');

require_once('frame/url/url.php');

class father{

public function __construct(){


}

public function index($page){



}

public function config($element){
	
	global $config;
	return $config[$element];
}


public function query_string($num){
	global $query;
	
	return $query[$num];
}


public function __destruct(){





}

}




$a = new father();


	








?>