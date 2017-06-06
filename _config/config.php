<?php

require 'environment.php';
date_default_timezone_set("America/Sao_Paulo");
define("URL_BASE", "http://segapp.app");

global $config;
$config = array();

if (ENVIRONMENT == "development") {
    $config["dbname"] = "dbteste";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} elseif (ENVIRONMENT == "production") {
    $config["dbname"] = "";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} else {
    echo "ENVIRONMENT não definido.";
}
?>