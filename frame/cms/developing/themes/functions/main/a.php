<?php


class main extends a_controller{

	public function __construct(){
		
		
		
	}

	



















//sure if user is admin return 2 user 1 other 0 ---->
public function login($email,$pass){
	$con = $this->db();
	$email = $this->db_filter($email);
	$pass = $this->db_filter($pass);
	$pass = sha1($pass);
	$result = $con->query("select * from users where email = '$email' and password ='$pass'");

	$num = @$result->num_rows;
	if($num == 1){
		$f = $result->fetch_array();
		if($f['admin'] == 1){
			return 2;
		}
		else{
		return 1;
		}
	}
	else{
		return 0;
	}
}


//past value is equal '' or 0 old version ----->
/*
public function edit_config($element,$value){
		$main_url = $this->out_url();
		$config = $main_url."/config.php";
		$config_cont = file_get_contents($config);
		switch ($element) {
			case 'htaccess':
		
		
		if($value == 1){
		$new_cont = str_replace("htaccess =0;", "htaccess =1;", $config_cont);
		}
		else{
			$new_cont = str_replace("htaccess =1;", "htaccess =0;", $config_cont);
		}
		@file_put_contents($config,$new_cont);
			break;

			case 'static':
				if($value == 1){
		$new_cont = str_replace("static      =0;", "static      =1;", $config_cont);
		}
		else{
			$new_cont = str_replace("static      =1;", "static      =0;", $config_cont);
		}
		@file_put_contents($config,$new_cont);
				break;


				case 'cache':
				if($value == 1){
		$new_cont = str_replace("cache    =0;", "cache    =1;", $config_cont);
		}
		else{
			$new_cont = str_replace("cache    =1;", "cache    =0;", $config_cont);
		}
		@file_put_contents($config,$new_cont);
				break;

				case 'theme':
				
		$new_cont = str_replace("theme   ='';", "theme   ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'main_folder':
				
		$new_cont = str_replace("main_folder  ='';", "main_folder  ='$value';", $config_cont);
		
		@file_put_contents($config,$new_cont);
				break;

				case 'helping_errors':
				if($value == 1){
		$new_cont = str_replace("helping_errors     =0;", "helping_errors     =1;", $config_cont);
		}
		else{
			$new_cont = str_replace("helping_errors     =1;", "helping_errors     =0;", $config_cont);
		}
		@file_put_contents($config,$new_cont);
				break;


				case 'installed':
				if($value == 1){
		$new_cont = str_replace("installed       =0;", "installed       =1;", $config_cont);
		}
		else{
			$new_cont = str_replace("installed       =1;", "installed       =0;", $config_cont);
		}
		@file_put_contents($config,$new_cont);
				break;








			
			default:
				echo "error in typig the config element";
				break;
		}





		





		//geting database info ---->




	}




*/






	

}
$m = new main();


?>