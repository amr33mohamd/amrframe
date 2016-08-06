<?php
class amr extends a_controller{

public function __construct(){
	parent::__construct();
	$main = new main;
		
		$old_value = $_POST['pk'];
		$new_value = $_POST['value'];
		$part = $_POST['name'];
		
		$main_url = $this->out_url('l');
			$theme = $this->config_out('theme');
			$static = $this->config_out('static');

		if($part == "header"){
			if($static == 0){
				$url = "$main_url"."/design/$theme/pages/header.php";
			}
			else{
				$url = "$main_url"."/design/$theme/pages/header.html";
			}
			$header_content  = file_get_contents($url);
			$new_content = str_replace($old_value,$new_value, $header_content);
			file_put_contents($url,$new_content);
		}
		else{
			$kind = substr($part,0,4);
			$name = substr($part, 5);
			switch ($kind) {
				case 'page':
					if($static == 0){
						$url = "$main_url"."/design/$theme/pages/$name".".php";
					}
					else{
						$url = "$main_url"."/design/$theme/pages/$name"."html";
					}
					$header_content  = file_get_contents($url);
					$new_content = str_replace($old_value,$new_value, $header_content);
					file_put_contents($url,$new_content);
					break;
				case 'part':
					if($static == 0){
						$url = "$main_url"."/design/$theme/parts/$name".".php";
					}
					else{
						$url = "$main_url"."/design/$theme/parts/$name"."html";
					}
					$header_content  = file_get_contents($url);
					$new_content = str_replace($old_value,$new_value, $header_content);
					file_put_contents($url,$new_content);
					break;
				
				default:
					
					break;
			}
		}



	}
}

$qm = new amr();
?>