<?php
function tpl_modifier_timestamp_to_date($string, $format="Y-m-d"){
	return date($format, $string);
}
?>