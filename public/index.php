<?php

ini_set("display_errors","On");
error_reporting(E_ALL);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

try {
    define('APP_PATH', realpath('..') . '/');
    define('ROOT_PATH', '/TechQ/');

    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');

    // Auto-loader configuration
    require APP_PATH . 'app/config/loader.php';

    // Load application services
    require APP_PATH . 'app/config/services.php';

    
    // set doctype
    \Phalcon\Tag::setDoctype(\Phalcon\Tag::HTML5);
    
    // handle the request
    $application = new Application($di);
    echo $application->handle()->getContent();
    
} catch (\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}
