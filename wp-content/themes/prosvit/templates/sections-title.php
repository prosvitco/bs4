<?php 
global $content;

 if($content['title_class']){
 	$class = 'class="'.$content['title_class'].'"';
 }else{
 	$class = FALSE;
 }
 	
echo '<'. $content['title_tag'] .' '. $class .'>'. $content['title'] .'</'. $content['title_tag'] .'>';