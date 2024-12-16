<?php

require_once dirname(__DIR__) . "/Classes/Router.php";
use Classes\Router;

//ADMIN
Router::addRoute("^admin/?$", ["controller" => "main", "action" => "index", "admin_prefix" => "admin"]);
Router::addRoute("^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$", ["admin_prefix" => "admin"]);

Router::addRoute("^admin/view/?$", ["controller" => "main", "action" => "index", "admin_prefix" => "admin"]);

// NO ADMIN
Router::addRoute("^$", ["controller" => "main", "action" => "index", "admin_prefix" => '']);
Router::addRoute("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$", ["admin_prefix" => '']);

Router::addRoute("^view/?$", ["controller" => "view", "action" => "index", "admin_prefix" => '']);
