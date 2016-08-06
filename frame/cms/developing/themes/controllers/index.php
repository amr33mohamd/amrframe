<?php

class amr extends a_controller{

public function __construct(){
	parent::__construct();
				

	$main = new main;

	$db = @$main->check_db();
	if($db == 1){
		header("Location : /404");

	}
	$this->page('index');

	if(@$_POST['signup']){
		
	if($db == 1){
		header("Location : /404.php");
		

		
	}
	else{


		//geting all data ------>
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$name = $_POST['name'];
		$theme = $_POST['themes'];
		$cache = $_POST['cache'];
		$static = $_POST['static'];
		$htaccess = $_POST['htaccess'];
		
		$db_host = $_POST['db_host'];
		$db_username = $_POST['db_user'];
		$db_pass = $_POST['db_pass'];
		$db_name = $_POST['db_name'];
		$main_folder = $_POST['main_folder'];
		
		//editing te frame config ------>
		$main->edit_config('theme',"$theme");
		$main->edit_config('cache',"$cache");
		$main->edit_config('theme',"$theme");
		$main->edit_config('static',"$static");
		$main->edit_config('htaccess',"$htaccess");
		$main->edit_config('main_folder',"$main_folder");
		


		


		//editing database -------->
		$ed_db = $main->edit_db_config("$db_host","$db_username","$db_pass","$db_name","$theme");

		sleep(2);
		//isstalling data base 
		$install = $main->install('install');
       
		
			//adding the admin ----->
			$main->add_user("$name","$email","$pass","1");
		

		
		
		
		

		

		
			

	}
	
}

if(@$_POST['login']){
	$email = $_POST['log_email'];
	$pass = $_POST['log_pass'];
$ok = $main->login($email,$pass);
if($ok == 1){
	echo "<script>alert('it\'s not your place ;)')</script>";
}
elseif($ok == 2){

$host  = $_SERVER['HTTP_HOST'];
$url = $_SERVER['REQUEST_URI'];
$replace = str_replace("index#login","", $url);
$final = str_replace("index","", $replace);
$f_url = "$host"."$final"."home";

echo "    <META http-equiv=\"refresh\" content=\"0;URL=http://$f_url\">";


}
else{
	echo "<script>alert('wrong email or password')</script>";
}


}





	}
}

$qm = new amr();


?>