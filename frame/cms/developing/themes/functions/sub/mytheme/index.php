<?php
class themes extends a_controller{

	public function __construct(){
		
		
		
	}

	public function get_themes(){
		$main_url = $this->out_url('j');
        echo $main_url;
		$themes = scandir("$main_url/design");
		$themes_counter = 1;
		$themes_count = count($themes) -2 ;
		
		while($themes_counter <= $themes_count){
			$themes_counter ++;
			$theme_image = "../../design/$themes[$themes_counter]/image.jpg";
			$theme_data =  "$main_url"."/design/$themes[$themes_counter]/data.php";
			
			require_once($theme_data);
			global $data;

			echo "<div class=\"col-md-55\">
                        <div class=\"thumbnail\">
                          <div class=\"image view view-first\">
                            <img style=\"width: 100%; display: block;\" src=\"$theme_image\" alt=\"$data[name]\" />
                            <div class=\"mask\">
                              <p>$data[name]</p>
                              <div class=\"tools tools-bottom\">
                                <a href=\"$data[contact]\" ><i  title=\"contact the programmer\" class=\"fa fa-link\"></i></a>
                                <a href=\"edit_theme/$themes[$themes_counter]\" title=\"custmize theme\"><i class=\"fa fa-pencil\"></i></a>
                                <a href=\"active_theme/$themes[$themes_counter]\"><i class=\"fa fa-plug\" title=\"active theme\"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class=\"caption\">
                            <p>$data[desc] </br><strong>created: </strong><small>$data[date]</small> 
                            <strong>-$data[developer]</strong></p>
                          </div>
                        </div>
                      </div>";
			
			
		}
	}

	}
	?>