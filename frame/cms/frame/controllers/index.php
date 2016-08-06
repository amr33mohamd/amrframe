<?php

class a_controller extends father{

public function __construct(){
	parent::__construct();
	
	$this->header(array('home','mytheme'));
	global $main_folder2;
	$aa = $this->config_out('installed');

	global $theme2;
	//instalion process -------->
	if($this->config_out('installed') == 0){
		include("design/themes/pages/index.php");
		
		if(@$_POST['signup']){
			//geting all submited data ------->
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

			
            if($this->check_db() == 2){
				//not connected database -------->
			$this->edit_db_config($db_host,$db_username,$db_pass,$db_name);
				
			$this->add_db($db_host,$db_username,$db_pass,$db_name);
			sleep(5);
$this->add_user($name,$email,$pass,1,$db_host,$db_username,$db_pass,$db_name);
			
			
				
			}
			elseif($this->check_db() == 0){
				// can't find users table  -------->
				$this->add_db();
				sleep(3);
				$this->add_user($name,$email,$pass,1);
			}
			elseif($this->check_db() == 1){
				//database ok ..... ------->
				
			}
			$htaccess = $this->config_out('htaccess');
			$theme = $this->config_out('theme');
			$cache = $this->config_out('cache');
			$static = $this->config_out('static');
			$installed = $this->config_out('installed');
			echo "htaccess :$installed";
			$this->modify_config('theme',"$theme",$theme);
			$this->modify_config('cache',"$cache",$cache);
			$this->modify_config('static',"$static",$static);
			$this->modify_config('htaccess',"$htaccess",$htaccess);
			$this->modify_config('main_folder',"$main_folder",$this->config_out('main_folder'));
			$this->modify_config('installed',"1",$this->config_out('installed'));
			$main_folder = $this->main_folder();
			if($main_folder != ""){
			$new_htaccess_main = "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase $main_folder/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . $main_folder/index.php [L]
</IfModule>
# END WordPress";
			}
			else{
$new_htaccess_main = "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress";
			}
			if($main_folder != ""){
			$new_htaccess_sub = "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase $main_folder/frame/cms/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . $main_folder/frame/cms/index.php [L]
</IfModule>
# END WordPress";
			}
			else{
$new_htaccess_sub = "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /frame/cms/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /frame/cms/index.php [L]
</IfModule>
# END WordPress";
			}

			//generating htaccess files ----------->
			
			$main_file = fopen("../../.htaccess","w+");
			fwrite($main_file,$new_htaccess_main);

			$sub_file = fopen(".htaccess","w+");
			fwrite($sub_file,$new_htaccess_sub);


		}

	}
	//geting full url ---->
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder2/","", $full_url);



	//devide into array :D ----------->
	$query = explode("/",$query_page);


	//geting selected page----->
	
	$file = $query[0];
	

	$dir_sub_function = "developing/$theme2/functions/sub/$file";
	$sub_function_files = @scandir($dir_sub_function);

	//helping error ------>
	if(!$sub_function_files && @$helping_errors == 1){
		echo "<br> -no sub_function files";
	}

	$num_sub_function = count($sub_function_files) - 1 ;
	while ($num_sub_function > 1) {
		@require_once("developing/$theme2/functions/sub/$file/$sub_function_files[$num_sub_function]");
		$num_sub_function --;
		
		
	}



	

	//main functions



	$dir_main_function = "developing/$theme2/functions/main";
	$main_function_files = @scandir($dir_main_function);

	//helping error ------>
	if(!$main_function_files && $helping_errors == 1){
		echo "<br> -no main_function files";
	}

	$num_main_function = count($main_function_files) - 1 ;
	while ($num_main_function > 1) {
		require_once("developing/$theme2/functions/main/$main_function_files[$num_main_function]");
		$num_main_function --;
		
		
	}


	

}




//db connecting ---->
	
public function db(){
		$theme = $this->config('theme');
		@require_once("developing/$theme/db/database.php");
		
		$use =new db;
		$conn =$use->conn();
		return $conn;
		}


	public function db2($host,$user,$pass,$db){
		$con = new mysqli($host,$user,$pass,$db);
		return $con;
	}	


	// --------- data base filtering to close sql injection //
	public function db_filter($var){
		$conn =$this->db();
		return htmlspecialchars($conn->real_escape_string(trim($var,"'")));
	}

	// --------- inputs or query strings closed xss ------------------//

	public function filter($var){
		return htmlspecialchars(trim($var,"'"));
	}


//geting part function ----->

public function part($part){
	$theme = $this->config('theme');
	$static = $this->config('static');
	
	$exist = file_exists("design/$theme/parts/$part".".php");
	if($exist){
		if($static == 0){
		require("design/$theme/parts/".$part.".php");
		}
		else{
		require("design/$theme/parts/".$part.".html");		
		}

	}
	else{
		echo "file not exist";
	}
}







public function header($pages){
	$theme = $this->config('theme');
	$static = $this->config('static');
	$file = $this->query_string('0');

	$num_pages = count($pages) -1;
	while($num_pages >= 0){
	$exist = file_exists("design/$theme/pages/$pages[$num_pages]".".php");
	if($exist){
		if($pages[$num_pages] == $file){
		if($static == 0){
		require_once("design/$theme/pages/header.php");
		}
		else{
		require_once("design/$theme/pages/header.html");
			}
			break;	
		}
		else{
		$num_pages --;
		}	
	}
	

	}
}

public function main_url(){
	$main_folder = $this->config('main_folder');
	$domain = $_SERVER['HTTP_HOST'];
	$main = $_SERVER['DOCUMENT_ROOT']."$main_folder";
	return $main;
}

public function url(){
	$main_folder = $this->config('main_folder');
	$theme = $this->config('theme');
	$domain = $_SERVER['HTTP_HOST'];
	$main = "http://".$domain."/$main_folder";
	return $main;
}




public function media_url(){
	$main_folder = $this->config('main_folder');
	$theme = $this->config('theme');
	$domain = $_SERVER['HTTP_HOST'];
	$main = "http://".$domain."/$main_folder/design/theme";
	return $main;
}









}



$mq = new a_controller();


?>