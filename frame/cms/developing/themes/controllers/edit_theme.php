<?php
class amr extends a_controller{

public function __construct(){
	parent::__construct();
	if(@$_POST['submit']){
		$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'theme';
$submit = str_replace(".php","", $_POST['select']);
$theme = $this->query_string('1');
		header("Location: http://$host$uri/$extra/$theme/$submit");

	}
	$main = new main;
	$this->page('edit_theme');
	

	}
}

$qm = new amr();
?>