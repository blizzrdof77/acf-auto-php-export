<?php
/**
 * Common PHP/Wordpress Methods & Functions
 *
 * @author Cement Marketing
 */

function acf_auto_php_export_improved_var_export ($variable, $return = false, $tab_chars = '') {
    if ($variable instanceof stdClass) {
        $result = '(object) '.acf_auto_php_export_improved_var_export(get_object_vars($variable), true);
    } else if (is_array($variable)) {
        $array = array();
        foreach ($variable as $key => $value) {
            $array[] = var_export($key, true).' => '.acf_auto_php_export_improved_var_export($value, true);
        }
        $result = 'array (' . "" . $tab_chars . implode(', ' . "", $array) . "" . $tab_chars . ')';
    } else {
        $result = var_export($variable, true);
    }

    if (!$return) {
        print $result;
        return null;
    } else {
        return $result;
    }
}
