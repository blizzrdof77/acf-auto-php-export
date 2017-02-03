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

/**
 * Get array item without breaking if it doesn't exist
 *
 * @return string
 */
function acf_auto_php_export_get_array_item($array, $key = 0, $fallback_val = false) {
    if (isset($array[$key])):
        return $array[$key];
    else:
        return $fallback_val;
    endif;
}


/**
 * Determine wordpress base path when wordpress core is not loaded
 *
 * @return string
 */
function acf_auto_php_export_get_wordpress_base_path() {
    $dir = dirname(__FILE__);
    do {
        // Check for wp-config.php (it is possible to check for other files here)
        if (file_exists($dir . "/wp-config.php")) {
            return $dir;
        }
    } while ($dir = realpath("$dir/.."));
    return null;
}

/**
 * Determine wordpress theme path when core is not loaded
 *
 * @return string
 */
function acf_auto_php_export_get_wordpress_theme_path() {
    $theme_path = cmnt_get_wordpress_base_path() . '/wp-content/themes';
    /** Loop through/register all ACF field groups in specified directory */
    if(file_exists($theme_path)) {
        $dir = new DirectoryIterator($theme_path);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $filename = $fileinfo->getFilename();
                if (strpos($filename, '.') !== 0 && is_dir($fileinfo->getPathname())) {
                    return $fileinfo->getPathname();
                }
            }
        }
    }
}

/**
 * Log to file on server - Optionally define global PHP variable $user_log_file
 *
 * Example:
 * $GLOBALS['user_log_file'] = '/var/log/userlog.log';
 *
 * @param  $msg [string] the log message to write
 * @param  $filename [string] the log file path on server
 * @return void
 */
function acf_auto_php_export_log_to_file($msg, $filename = null) {
    global $user_log_file;
    if (null !== $filename) {
        $fd = fopen($filename, "a");
    } elseif (isset($user_log_file)) {
        $fd = fopen($user_log_file, "a");
    }
    $date = "[" . date("Y/m/d h:i:s", strtotime('Now')) . "] ";
    if (!is_string($msg)) {
        $msg = var_export($msg, true);
    }
    fwrite($fd, $date . "\n");
    fwrite($fd, $msg . "\n");
    fclose($fd);
}
