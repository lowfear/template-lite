<?php

function tpl_modifier_replase_links($text) {
	//return $text;
	//$text = preg_replace("#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#", "<a rel='nofollow' target='_blank' href=\"http://".$_SERVER['SERVER_NAME']."/r.php?url=\\0\">\\0</a>", $text);

	$text = str_replace('"&quot;', '"', $text);
	$text = htmlspecialchars_decode($text);
	$text = str_replace('\"', '', $text);
	while(strchr($text, '\\')) $text = stripslashes($text);

	$search = array(); $replace = array();
	preg_match_all("/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU", $text, $matches, PREG_SET_ORDER);
	if (is_array($matches) && (count($matches) > 0)) {
		foreach($matches as $key=>$match) {
			if(filter_var($match[2], FILTER_VALIDATE_URL)) {
				$text = str_replace($match[0], "!!LINK_".$key."_!!!", $text);
				$search[] = "!!LINK_".$key."_!!!";
				$replace[] = "<a rel='nofollow' target='_blank' href=\"http://".$_SERVER['SERVER_NAME']."/r.php?url=".$match[2]."\">".$match[3]."</a>";
			}
		}
	}

	$text = preg_replace('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', "<a rel='nofollow' target='_blank' href=\"http://".$_SERVER['SERVER_NAME']."/r.php?url=\\0\">\\0</a>", $text);
	if ((count($search) > 0) && (count($replace) > 0)) {
		$text = str_replace($search, $replace, $text);
	}
	unset($search); unset($replace);

	return $text;
}

?>
