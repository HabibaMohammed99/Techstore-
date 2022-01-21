<?php

//path , url
// $path = __DIR__ . "/";
define("PATH", __DIR__ . "/");
define("URL","http://localhost/Techstore/");
define("APATH", __DIR__ . "/admin/");
define("AURL","http://localhost/Techstore/admin/");


define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","tech_store");


//classess
require_once (PATH."vendor/autoload.php");

use TechStore\Classes\Request;
use TechStore\Classes\Session;

//objects
$request = new Request;
$session = new Session; 
