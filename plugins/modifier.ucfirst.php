<?php
function tpl_modifier_ucfirst($text){
	$x = explode(" ", $text);
	if (is_array($x) && count($x) > 1){
		foreach ($x as $k=>$v) $x[$k] = ucfirst($v);
		return implode("-", $x);
	} else {
		$x = explode("-", $text);
		if (is_array($x) && count($x) > 1){
			foreach ($x as $k=>$v) $x[$k] = ucfirst($v);
			return implode("-", $x);
		} else return ucfirst($text);
	}
}

?>
