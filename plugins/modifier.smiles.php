<?php
function tpl_modifier_smiles($text){
	global $_sys;
	$smilies = array(1 => ":wink:", 2 => ":winked:", 3 => ":smile:", 4 => ":am:", 5 => ":fellow:", 6 => ":love:", 7 => ":no:", 8 => ":recourse:", 9 => ":request:", 10 => ":sad:", 11 => ":crying:", 12 => ":angry:"); 
	$gif = array(1 => "img/emoticons/wink.gif", 2 => "img/emoticons/winked.gif", 3 => "img/emoticons/smile.gif", 4 => "img/emoticons/am.gif", 5 => "img/emoticons/fellow.gif", 6 => "img/emoticons/love.gif", 7 => "img/emoticons/no.gif", 8 => "img/emoticons/recourse.gif", 9 => "img/emoticons/request.gif", 10 => "img/emoticons/sad.gif", 11 => "img/emoticons/crying.gif", 12 => "img/emoticons/angry.gif"); 
	for($i = 1; $i  < count($smilies)+1; $i++) {
		$text = preg_replace("/(.*?)".$smilies[$i]."(.*?)/is", '$1<img src="'.$_sys['staticDomain']."/".$gif[$i].'" alt="'.substr($smilies[$i], 1, strlen($smilies[$i])-2).'" />$2', $text); 
	}
	$text = nl2br($text);
	return $text;
}
?>