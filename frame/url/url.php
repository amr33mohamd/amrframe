<?php


if($htaccess = 1){
	
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



	//checking if that page exist if the page is static------->
	if($static == 1){
		$src = 'design/'.$theme.'/pages/'.$file.'.html';
		$exist = file_exists($src);
		if($exist){

		}
		else{
			echo "not exist";
		}
	}
	else{
		$src = 'developing/'.$theme.'/controllers/'.$file.'.php';
		$exist = file_exists($src);
		if($exist){

		}
		else{
			echo "<br> -not exist";
		}
	}	


	//geting all css files without cashing ;) ----->
	echo "<head>";
	$dir_css = "design/$theme/css/$file";
	$css_files = @scandir($dir_css);

	//helping error ------>
	if(!$css_files && $helping_errors == 1){
		echo "<br> -no css files";
	}

	$num_css = count($css_files) - 1 ;
	while ($num_css > 1) {
		if($cache == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"design/css/$file/$css_files[$num_css]?$date\" />";
		}
		else{
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"design/css/$file/$css_files[$num_css]\" /> ";
		}
		$num_css --;
	}


	
	

	$domain = $_SERVER['HTTP_HOST'];
	$main = $_SERVER['DOCUMENT_ROOT']."$main_folder";
 	

 	//main css 
 	$dir_css = "design/$theme/css/main";
	$css_files = @scandir($dir_css);

	//helping error ------>
	if(!$css_files && $helping_errors == 1){
		echo "<br> -no css files";
	}

	$num_css = count($css_files) ;
	$counter_main_css = 2;
	while ($num_css > $counter_main_css) {
		if($cache == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"design/$theme/css/main/$css_files[$counter_main_css]?$date\" />";
		}
		else{
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"design/$theme/css/main/$css_files[$counter_main_css]\" /> ";
		}
		$counter_main_css ++;
	}

//geting all js files and js without cashing ;) ----->
	$dir_js = "design/$theme/js/$file";
	$js_files = @scandir($dir_js);


	//helping error ------>
	if(!$js_files && $helping_errors == 1){
		echo "<br> -no js folders";
	}


	$num_js = count($js_files) - 1 ;
	while ($num_js > 1) {
		if($cache == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<script src=\"design/js/$file/$js_files[$num_js]?$date\" ></script>";
		}
		else{
			echo "<script src=\"design/js/$file/$js_files[$num_js]?$date\" ></script>";
		}
		$num_js --;
	}



//main js
	//geting all js files and js without cashing ;) ----->
	$dir_js_main = "design/$theme/js/main";
	$js_main_files = @scandir($dir_js_main);


	//helping error ------>
	if(!$js_main_files && $helping_errors == 1){
		echo "<br> -no js_main folders";
	}


	$num_js_main = count($js_main_files) ;
	$counter_js_main = 2;
	while ($num_js_main > $counter_js_main) {
		if($cache == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<script src=\"design/$theme/js/main/$js_main_files[$counter_js_main]?$date\" ></script>";
		}
		else{
			echo "<script src=\"design/$theme/js/main/$js_main_files[$counter_js_main]?$date\" ></script>";
		}
		$counter_js_main ++;
	}

	echo "</head>";


	//geting the controller --------------->
	require_once("developing/$theme/controllers/".$file.".php");

















}
else{












}
















?>