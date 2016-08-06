<?php
class amr extends a_controller{

public function __construct(){
	parent::__construct();
	$theme = new theme;
	$theme->get_page($this->query_string('2'));
	$this->page('theme');



	$main = new main;
	// upload functions -------------->
	if(@$_POST['submit2']){
			$url_out = $this->out_url('h');
			$theme = $this->config_out('theme');
			$target_dir = "$url_out"."/design/$theme/images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			
			

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";

			       $image_name =  basename($_FILES["fileToUpload"]["name"]);
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}


			//editing the file with the new image ----------->
			$old_src = explode("/",$_POST['src']);
			$old_src = end($old_src);

			// sorry for next code hahahahahahahahah :D  I can't explain be smart and understand it ;) -----> 
			$part = $_POST['part'];
			$this->editing_file($old_src,$image_name,$part);
		}
			//End uploading ------------->








	}



	


	public function editing_file($old_src,$new_src,$part){
		$main = new main;
		$url_out = $this->out_url('h');
		$theme = $main->config_out('theme');
		$part_place = substr($part,0,4);
		$file = substr($part,5);
		switch ($part_place) {
			case 'head':
				$url = "$url_out"."/design/$theme/pages/header.php";
				break;
			case 'page':
				$url = "$url_out"."/design/$theme/pages/"."$file".".php";
				break;
			case 'part':
				$url = "$url_out"."/design/$theme/parts/"."$file".".php";
				break;

			
			default:
				$url = "wrong";
				break;
		}
		$file_content  = file_get_contents($url);
		$new_content = str_replace($old_src,$new_src, $file_content);
		file_put_contents($url,$new_content);

	}


}

$qm = new amr();
?>