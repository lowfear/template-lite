<?php

class tpl_class_main
{

    function __construct()
    {
        
    }
	
	function getTestParams($params, &$tpl)
    {
        return print_r($params, true);
    }
}

?>
