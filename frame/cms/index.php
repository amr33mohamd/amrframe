<?php
session_start();
ob_start();

require_once('config.php');

require_once('frame/controllers/index.php');
require_once('../../config.php');

require_once('frame/url/url.php');

class father{

public function __construct(){
 	

}

public function index($page){



}

public function config($element){
	include('config.php');
	global $config2;
	return $config2[$element];
}

//ading our frame database -------->
public function add_db($host,$user,$pass,$db){
	
	$conn =  $this->db2($host,$user,$pass,$db);
	 //Change Your Database Name
$main_url = $this->out_url('install');
	$config = $main_url."/frame/cms/developing/themes/db/users.sql";
	$config = str_replace("//","/",$config);
	$filename = str_replace("/index.php/frame/cms","", $config);
	
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}

}

//the old version of editing db value is always '' ---->
public function edit_db_config($host,$user,$pass,$name){
	$domain = $_SERVER['REQUEST_URI'];
	$main_folder = str_replace("/index.php","", "$domain");
	$main_folder = str_replace("/index","", "$main_folder");
	$main_folder = str_replace("/","", "$main_folder");
	$main_url = $this->out_url('install');
	$config = $main_url."/frame/cms/developing/themes/db/database.php";
	$config = str_replace("//","/",$config);
	$config = str_replace("/index.php/frame/cms","", $config);
	
		$config_cont = file_get_contents($config);
		
	
		$use =new db;
		$db_config =$use->get_db();
		

		
		
		$new_cont = str_replace("server = '$db_config[server]'","server = '$host'",$config_cont);
        $new_cont = str_replace("user = '$db_config[user]'","user = '$user'",$new_cont);
        $new_cont = str_replace("pass = '$db_config[pass]'","pass = '$pass'",$new_cont);
        $new_cont = str_replace("db = '$db_config[db]'","db = '$name'",$new_cont);
		
		
			
		
		file_put_contents($config,$new_cont);
		
					

}

//get config out ------>
public function config_out($element){
	
	include("../../config.php");
	
	global $config;
	
	return $config[$element];


}


//check if there is table or not --------->
public function check_db(){
$conn =  $this->db();
if(@$conn->ping()){
	$table = "users";
$result = @$conn->query("SHOW TABLES LIKE '$table'");
if(@$result->num_rows ==1) {
    return 1;
}
else {
	return 0;
}


}
else{
	return 2;
}


}






//adding user to users table ----->
public function add_user($name,$email,$password,$admin,$db_host,$db_username,$db_pass,$db_name){
	$con = $this->db2($db_host,$db_username,$db_pass,$db_name);
	
	$password_cry = sha1($password); 
	$result = $con->query("select * from users where email = '$email'");
	if(@$result->num_rows >= 1){
		return 0;
	}
	else{
	$con->query("insert into users(name,email,password,admin) values('$name','$email','$password_cry','$admin')");
	return 1;
	}	
}






//checking instaltion , install  ---------------->
public function install($statue){
	$install = $this->config('installed');
	$db = $this->check_db();

	if($install != 1 || $db != 1){
		if($statue == "check"){
			return 0;
		}
		else{
		$this->add_db();
		$main_url = $this->out_url();
		$config = $main_url."/config.php";
		$config_cont = file_get_contents($config);
		$new_cont = str_replace("installed       =0;", "installed       =1;", $config_cont);
		
		@file_put_contents($config,$new_cont);
		header("Refresh:0");
		}


	}



	
}




//it's geting past value than edit it config.php ------>
		public function modify_config($element,$value,$past){
		$main_url = $this->out_url('install');
		$config = $main_url."/config.php";
	$config = str_replace("//","/",$config);
	$config = str_replace("/frame/cms/index.php","", $config);
		$config_cont = file_get_contents($config);
		switch ($element) {
			case 'htaccess':
		
		
		
		$new_cont = str_replace("htaccess =$past;", "htaccess =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
			break;

			case 'static':
				
		$new_cont = str_replace("static      =$past;", "static      =$value;", $config_cont);
		
			
		
		@file_put_contents($config,$new_cont);
				break;


				case 'cache':
				
		$new_cont = str_replace("cache    =$past;", "cache    =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'theme':
				
		$new_cont = str_replace("theme   ='$past';", "theme   ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'main_folder':
				
		$new_cont = str_replace("main_folder  ='$past';", "main_folder  ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'helping_errors':
				
		$new_cont = str_replace("helping_errors     =$past;", "helping_errors     =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;


				case 'installed':
				
		$new_cont = str_replace("installed       =$past;", "installed       =$value;", $config_cont);
		
			
		@file_put_contents($config,$new_cont);
				break;








			
			default:
				echo "error in typig the config element";
				break;
		}


	}



	public function modify_config_in($element,$value,$past){
		$main_url = $this->out_url('a');
		echo $main_url;
		$config = $main_url."/config.php";

		$config_cont = file_get_contents($config);
		switch ($element) {
			case 'htaccess':
		
		
		
		$new_cont = str_replace("htaccess =$past;", "htaccess =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
			break;

			case 'static':
				
		$new_cont = str_replace("static      =$past;", "static      =$value;", $config_cont);
		
			
		
		@file_put_contents($config,$new_cont);
				break;


				case 'cache':
				
		$new_cont = str_replace("cache    =$past;", "cache    =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'theme':
				
		$new_cont = str_replace("theme   ='$past';", "theme   ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'main_folder':
				
		$new_cont = str_replace("main_folder  ='$past';", "main_folder  ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'helping_errors':
				
		$new_cont = str_replace("helping_errors     =$past;", "helping_errors     =$value;", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;


				case 'installed':
				
		$new_cont = str_replace("installed       =$past;", "installed       =$value;", $config_cont);
		
			
		@file_put_contents($config,$new_cont);
				break;








			
			default:
				echo "error in typig the config element";
				break;
		}


	}



	//geting page design ------->
public function page($page){
	$theme = $this->config('theme');
	$static = $this->config('static');
	
	$exist = file_exists("design/$theme/pages/$page".".php");
	if($exist){
		if($static == 0){
		require_once("design/$theme/pages/".$page.".php");
		}
		else{
		require_once("design/$theme/pages/".$page.".html");
		}		
	}
	else{
		echo "page is not exist";
	}
}


//geting query string ---------->


public function query_string($num){
	$main_folder2 = $this->config('main_folder');
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder2/","", $full_url);


	//filtering from // :D ----------->
	$query_page_filtered = str_replace("//","/", $query_page);
 


	//devide into array :D ----------->
	$query = explode("/",$query_page_filtered);


	
	return $query[$num];
}

//main folder while installing ------->
public function main_folder(){
$url = $_SERVER['REQUEST_URI'];
$main_folder = str_replace("/frame/cms/index.php","", $url);
return $main_folder;	
}


public function out_url($status){
	if($status == 'install'){
		$host = $_SERVER['DOCUMENT_ROOT'];
		$url = $_SERVER['REQUEST_URI'];
		$main_folder = str_replace("/frame/cms/index.php#login","", $url);
		$main_folder = str_replace("/frame/cms/index.php#signup","", $main_folder);
		$main_folder = str_replace("//","/", $main_folder);
		if($main_folder == ""){
			$url = "$host";
		}
		else{
			$url = "$host"."$main_folder";
		}
		return $url;
	}
	else{
	$main_folder = $this->config_out('main_folder');
	
	$domain = $_SERVER['HTTP_HOST'];
	$main = $_SERVER['DOCUMENT_ROOT']."$main_folder";
	return $main;
	}
}


public function __destruct(){





}

}




$a = new father();


	








?>