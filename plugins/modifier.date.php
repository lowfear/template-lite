<?php
function tpl_modifier_date($string, $format="r", $default_date=null){
	if ($format == "Y-m-d") $format = "d-m-Y";
	elseif ($format == "Y-m-d H:i:s") $format = "d-m-Y H:i:s";
	
	if (strtotime($string) < 0) return "not set";
	if ($string != '') return date($format, strtotime($string));
	elseif (isset($default_date) && $default_date != '') return date($format, strtotime($default_date));
	else return;
}
?>