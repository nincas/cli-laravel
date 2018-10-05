<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Debug\ErrorHandler;

function loadENV() {
    $env_path = dirname(__DIR__) . '/.env';
    (new Dotenv)->load($env_path);
}

function load_components() {
    loadENV();
    date_default_timezone_set(getenv('TIMEZONE'));

    if (getenv('DEBUG') == true) {
        ini_set('display_errors', 'On');
        error_reporting(E_ALL);
        Debug::enable();
        ErrorHandler::register();
        ExceptionHandler::register();
        DebugClassLoader::enable();
    }
}

function exec_function() {
    require "./method_routes.php";
    foreach ($functions as $function => $path) {
        $path::$function();
    }
}