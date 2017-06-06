<?php

session_start();
require_once '_config/config.php';

spl_autoload_register(function($paramClass) {
    $class = ucfirst(strtolower($paramClass));
    if (file_exists("_controllers/" . $class . ".php")) {
        require_once "_controllers/" . $class . ".php";
    } elseif (file_exists("_models/" . $class . ".php")) {
        require_once "_models/" . $class . ".php";
    } elseif (file_exists("_core/" . $class . ".php")) {
        require_once "_core/" . $class . ".php";
    }
});

$core = new Core();
$core->run();
?>