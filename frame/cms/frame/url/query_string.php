<?php





$main_folder = $this->config('main_folder');
//geting full url ---->
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder/","", $full_url);

	//filtering from // :D ----------->
	$query_page_filtered = str_replace("//","/", $query_page);
 


	//devide into array :D ----------->
	$query = explode("/",$query_page_filtered);


	//geting selected page----->
	
	$file = $query[0];




?>