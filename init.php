<?php

define('ROOT_DIR', realpath(dirname(__FILE__)));
define('WWW_DIR', ROOT_DIR . '/www');

// автозагрузчик классов
spl_autoload_register('autoload');

function autoload($className)
{
    $file_name = ROOT_DIR . '/lib/' .
        str_replace('_', '/', $className) . '.php';

    if (file_exists($file_name)) {
        require_once $file_name;
    }
}