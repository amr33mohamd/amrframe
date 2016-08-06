<?php
/*


Frame is build from zero by amr mohamed and all rights reserved to his team timerit :D 
for more information or idias or errors please contatct me ;)


*/

//if you activited the htaccess mat it 1 else make it 0      1----->
$htaccess =1;


//if you but your site directly make it empty else type your site folder     2---->
$main_folder  ='amrframe';


//type the name of the theme you use     3---->
$theme   ='themes';

//if you wanna active the cache of css , js files make it 1 else make it 0   4--->
$cache    =0;


//if you need the frame to help you with it's build-in error make it 1 else 0   5----->
$helping_errors     =0;


//if you are using static theme without developing make it 1 else 0   6----->
$static      =0;


//istalling statue 7 -------------->
$installed       =1;




//please don't touch that :D ---->



global $config;
$config =array("htaccess"=>"$htaccess","main_folder" =>"$main_folder","theme"=>"$theme","helping_errors"=>"$helping_errors","static"=>"$static","installed"=>"$installed","cache"=>"$cache");











?>