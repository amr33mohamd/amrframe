<?php


if($htaccess = 1){
	
	//geting full url ---->
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder2/","", $full_url);


	//filtering from // :D ----------->
	$query_page_filtered = str_replace("//","/", $query_page);
 


	//devide into array :D ----------->
	$query = explode("/",$query_page_filtered);


	//geting selected page----->
	
	$file = $query[0];

	


	//checking if that page exist if the page is static------->
	if($not_found == 1){
	if($static2 == 1){

		$src = 'design/'.$theme2.'/pages/'.$file.'.html';
		$exist = file_exists($src);
		if($exist){

		}
		else{
			$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '404';

		header("Location: http://$host$uri/$extra");
		}
	}
	else{
		$src = 'developing/'.$theme2.'/controllers/'.$file.'.php';
		$exist = file_exists($src);
		if($exist){

		}
		else{
			$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '404';

		header("Location: http://$host$uri/$extra");
		}

	}	
}


	//geting all css files without cashing ;) ----->
	echo "<head>";
	$dir_css2 = "design/$theme2/css/$file";
	$css_files2 = @scandir($dir_css2);


	//helping error ------>
	if(!$css_files2 && $helping_errors2 == 1){
		echo "<br> -no css files";
	}
	
	$num_css2 = count($css_files2) ;
	$counter_sub_css = 2;
	while ($num_css2 > $counter_sub_css) {
		if($cache2 == 0){
			$date2 = date('l jS \of F Y h:i:s A');
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$main_folder2/design/$theme2/css/$file/$css_files2[$counter_sub_css]?$date2\" />";
		}
		else{
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$main_folder2/design/$theme2/css/$file/$css_files2[$counter_sub_css]\" /> ";
		}
		$counter_sub_css ++;
	}


	
	

	$domain = $_SERVER['HTTP_HOST'];
	$main = $_SERVER['DOCUMENT_ROOT']."$main_folder2";
 	

 	//main css 
 	$dir_css = "design/$theme2/css/main";
	$css_files = @scandir($dir_css);

	//helping error ------>
	if(!$css_files && $helping_errors2 == 1){
		echo "<br> -no css files";
	}

	$num_css = count($css_files) ;
	$counter_main_css = 2;
	while ($num_css > $counter_main_css) {
		if($cache2 == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$main_folder2/design/$theme2/css/main/$css_files[$counter_main_css]?$date\" />";
		}
		else{
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$main_folder2/design/$theme2/css/main/$css_files[$counter_main_css]\" /> ";
		}
		$counter_main_css ++;
	}

//geting all js files and js without cashing ;) ----->
	$dir_js = "design/$theme2/js/$file";
	$js_files = @scandir($dir_js);


	//helping error ------>
	if(!$js_files && $helping_errors2 == 1){
		echo "<br> -no js folders";
	}


	$num_js = count($js_files) - 1 ;
	while ($num_js > 1) {
		if($cache2 == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<script src=\"/$main_folder2/design/js/$file/$js_files[$num_js]?$date\" ></script>";
		}
		else{
			echo "<script src=\"/$main_folder2/design/js/$file/$js_files[$num_js]?$date\" ></script>";
		}
		$num_js --;
	}



//main js
	//geting all js files and js without cashing ;) ----->
	$dir_js_main = "design/$theme2/js/main";
	$js_main_files = @scandir($dir_js_main);


	//helping error ------>
	if(!$js_main_files && $helping_errors2 == 1){
		echo "<br> -no js_main folders";
	}


	$num_js_main = count($js_main_files) ;
	$counter_js_main = 2;
	while ($num_js_main > $counter_js_main) {
		if($cache2 == 0){
			$date = date('l jS \of F Y h:i:s A');
			echo "<script src=\"/$main_folder2/design/$theme2/js/main/$js_main_files[$counter_js_main]?$date\" ></script>";
		}
		else{
			echo "<script src=\"/$main_folder2/design/$theme2/js/main/$js_main_files[$counter_js_main]?$date\" ></script>";
		}
		$counter_js_main ++;
	}

	echo "</head>";


	//geting the controller --------------->
	
	if($file == "index.php"){
		
	}
	else{
	require_once("developing/$theme2/controllers/".$file.".php");
    }

















}
else{












}
















?>