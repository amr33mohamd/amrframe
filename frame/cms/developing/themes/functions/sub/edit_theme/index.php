<?php
class edit extends a_controller{

	public function __construct(){
		
		
		
	}
	public function all_pages($theme){
		$main_url = $this->out_url('l');
		
		$dir = "$main_url"."/developing/$theme/controllers";
		$pages = scandir($dir);
		$num_pages = count($pages) ;
		echo $num_pages;
		$counter = 2;
		while ($counter < $num_pages) {
			
			echo "<option value=\"$pages[$counter]\">$pages[$counter]</option>";
			$counter ++;
		}
	}
}	
?>