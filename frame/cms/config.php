<?php
/*


Frame is build from zero by amr mohamed and all rights reserved to his team timerit :D 
for more information or idias or errors please contatct me ;)
please don'y touch any space or change it ---> (<------important ------>)

*/

//if you activited the htaccess mat it 1 else make it 0 ----->
$htaccess2 = 1;


//if you but your site directly make it empty else type your site folder ---->


$domain = $_SERVER['REQUEST_URI'];

$url_ar = explode("/frame/cms/",$domain);

$num = count($url_ar);
if($num == 1){
	$main_folder2 = '';
}
else{
	$main_folder2 = substr($url_ar[0], 1)."/frame/cms";
}



//not found page ------->
$not_found = 0;

//type the name of the theme you use ---->
$theme2 = 'themes';

//if you wanna active the cache of css , js files make it 1 else make it 0 --->
$cache2 = 0;


//if you need the frame to help you with it's build-in error make it 1 else 0 ----->
$helping_errors2 = 0;


//if you are using static theme without developing make it 1 else 0 ----->
$static2 = 0;


//istalling statue -------------->
$installed2 =1;




//please don't touch that :D ---->




$config2 =array("htaccess"=>"$htaccess2","main_folder" =>"$main_folder2","theme"=>"$theme2","helping_errors"=>"$helping_errors2","static"=>"$static2","installed"=>"$installed2","cache"=>"$cache2");











?>