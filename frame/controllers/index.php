<?php

class a_controller extends father{

public function __construct(){
	parent::__construct();
	$install = $this->config('installed');

	$this->header(array('index'));
	$domain = $_SERVER['REQUEST_URI'];
	$main_folder = str_replace("/index.php","", "$domain");
	$main_folder = str_replace("/index","", "$main_folder");
	$main_folder = str_replace("/","", "$main_folder");

	
	
	if($install != 1 ){
			$host = $_SERVER['HTTP_HOST'];

			$a = $_SERVER['REQUEST_URI'];
			$a = str_replace("/index.php","", $a);
			
			
			
			header("Location: http://$host".$a."/frame/cms/index.php");
		}
		else{
		
		}
	
	global $main_folder;
	if($main_folder == 'amrframe'){
        $domain = $_SERVER['REQUEST_URI'];

$url_ar = explode("/",$domain);

$num = count($url_ar);
if($num == 1){
	$main_folder = '';
}
else{
	$main_folder = substr($url_ar[0], 1);
}
    }
	global $theme;
	//geting full url ---->
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder/","", $full_url);



	//devide into array :D ----------->
	$query = explode("/",$query_page);


	//geting selected page----->
	
	$file = $query[0];
	

	$dir_sub_function = "developing/$theme/functions/sub/$file";
	$sub_function_files = @scandir($dir_sub_function);

	//helping error ------>
	if(!$sub_function_files && $helping_errors == 1){
		echo "<br> -no sub_function files";
	}

	$num_sub_function = count($sub_function_files) - 1 ;
	while ($num_sub_function > 1) {
		require_once("developing/$theme/functions/sub/$file/$sub_function_files[$num_sub_function]");
		$num_sub_function --;
		
		
	}





	//main functions



	$dir_main_function = "developing/$theme/functions/main";
	$main_function_files = @scandir($dir_main_function);

	//helping error ------>
	if(!$main_function_files && $helping_errors == 1){
		echo "<br> -no main_function files";
	}

	$num_main_function = count($main_function_files) - 1 ;
	while ($num_main_function > 1) {
		require_once("developing/$theme/functions/main/$main_function_files[$num_main_function]");
		$num_main_function --;
		
		
	}


}
	

public function url(){
	$main_folder = $this->config('main_folder');
	$theme = $this->config('theme');
	$domain = $_SERVER['HTTP_HOST'];
	$main = "http://".$domain."/$main_folder/design/$theme";
	return $main;
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

//db connecting ---->
	
public function db(){
		$theme = $this->config('theme');
		if($theme == ""){
			$theme = "themes";
		}
		require_once("developing/$theme/db/database.php");
		global $conn;
		$use =new db;
		$conn =$use->conn();
		return $conn;
		}


	// --------- data base filtering to close sql injection //
	public function db_filter($var){
		$conn =$this->db();
		return htmlspecialchars(mysqli_real_escape_string($conn,trim($var,"'")));
	}

	// --------- inputs or query strings closed xss ------------------//

	public function filter($var){
		return htmlspecialchars(trim($var,"'"));
	}


//geting part function ----->

public function part($part){
	$theme = $this->config('theme');

	
	$exist = file_exists("design/$theme/parts/$part".".php");
	if($exist){
		if($static == 0){
		require_once("design/$theme/parts/".$part.".php");
		}
		else{
		require_once("design/$theme/parts/".$part.".html");		
		}

	}
	else{
		echo "file not exist";
	}
}


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


public function check_db(){
$conn =  $this->db();
$table = "users";
$result = @$conn->query("SHOW TABLES LIKE '$table'");
if($result->num_rows ==1) {
    return 1;
}
else {
	return 0;
}

}




}



$mq = new a_controller();


?>