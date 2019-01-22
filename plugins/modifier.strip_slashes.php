<?php
function tpl_modifier_strip_slashes($text){
	//return stripslashes($text);
	while(strchr($text,'\\')) $text = stripslashes($text); 
	return $text;
}

?>
