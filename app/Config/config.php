<?php

//---------- Config
const SITENAME = "website blog and shop";
const BASE_URL = "http://localhost/php_mvc_tur";
define("APP_ROOT", dirname(__DIR__));  //dirname(__DIR__) : یک پوشه بر میگیرده عقب -> C:\xampp\htdocs\php_mvc_tur\app

//---------- DATABASE
const DB_HOST = "localhost";
const DB_PORT = 3307;
const DB_DATABASE = "php_mvc_tur";
const DB_USERNAME = "root";
const DB_PASSWORD = "";

//---------- Methods
function assets($url)
{
    echo BASE_URL . "/public" . $url;
}

function url($url)
{
    echo BASE_URL . $url;
}