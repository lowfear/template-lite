<?php
function compile_compile_custom_class($function, $modifiers, $arguments, &$_result, &$object)
{
    list($class, $function) = explode('->', $function);

    if ($object->_plugin_exists($class, "class", $function)) {
        $_args = $object->_parse_arguments($arguments);

        $_assign_var = false;
        foreach ($_args as $key => $value) {
            if ($key == 'assign') {
                $_assign_var = $value;
                unset($_args['assign']);
                continue;
            }
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
            if (is_null($value)) {
                $value = 'null';
            }
            $_args[$key] = "'$key' => $value";
        }

        $_return .= '$this->_plugins["class"][' . $class . ']->' . $function . '(array(' . implode(',', (array)$_args) . '), $this)';

        $_result = '<?php ';
        if (!empty($_assign_var)) $_result .= ' $this->assign(\'' . $object->_dequote($_assign_var) . '\', ' . $_return . ');';
        else $_result = 'echo ' . $return . ';';
        $_result .= '?>';

        return true;
    } else {
        return false;
    }
}

?>