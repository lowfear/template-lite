<?php

function tpl_function_math($params, &$template_object){
    if (empty($params['equation'])) return;
    $equation = $params['equation'];
    if (substr_count($equation,"(") != substr_count($equation,")")) return;

    preg_match_all("![a-zA-Z][a-zA-Z0-9_]*!",$equation, $match);
    $allowed_funcs = array('int','abs','ceil','cos','exp','floor','log','log10', 'max','min','pi','pow','rand','round','sin','sqrt','srand','tan');

    foreach($match[0] as $curr_var){
        if (!in_array($curr_var,array_keys($params)) && !in_array($curr_var, $allowed_funcs)){
            //return;
        }
    }

    foreach($params as $key => $val) {
        if ($key != "equation" && $key != "format" && $key != "assign") {
            if (strlen($val)==0) return;
            if (!is_numeric($val)) return;
            $equation = preg_replace("/\b$key\b/",$val, $equation);
        }
    }
 
    eval("\$template_object_math_result = ".$equation.";");

    if (empty($params['format'])) {
        if (empty($params['assign'])) return $template_object_math_result;
        else $template_object->assign($params['assign'],$template_object_math_result);
    } else {
        if (empty($params['assign'])) printf($params['format'],$template_object_math_result);
        else $template_object->assign($params['assign'],sprintf($params['format'],$template_object_math_result));
    }

}

?>