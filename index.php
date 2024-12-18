<?php 

require_once "vendor/autoload.php";

require_once "Config/helpers.php";

require_once "Config/routes.php";
require_once "Classes/Router.php";
require_once "Classes/Controller.php";

use Classes\Router;

$url = trim(urldecode($_SERVER["QUERY_STRING"]), '/');
Router::dispatch($url);