<?php

namespace Classes;

class Router
{
    // Таблица маршрутов
    protected static array $routes = [];

    // Текущий маршрут
    protected static array $route = [];

    public static function addRoute($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    protected static function getRoutes(): array
    {
        return self::$routes;
    }

    protected static function getRoute(): array
    {
        return self::$route;
    }

    // Проверка на наличие get-параметров
    protected static function removeQueryString($url)
    {
        if($url)
        {
            $queryString = explode('&', $url, 2);
            
            if(false === str_contains($queryString[0], '=')){
                return rtrim($queryString[0], '/');
            }
        }

        return '';
    }

    // Проверяем соответствие preg_match
    protected static function matchRoute($url): bool
    {        
        $matches = [];

        foreach(self::$routes as $pattern => $route)
        {
            if(preg_match("#{$pattern}#", $url, $matches))
            {
                // Правильное значение записывается в массив $route
                foreach($matches as $k => $v)
                {
                    $route[$k] = $v;
                }

                (empty($route["action"])) ?? $route["action"] = "index";
                
                (!isset($route["admin_prefix"])) ? $route["admin_prefix"] = '' : $route["admin_prefix"] .= '\\';

                $route["controller"] = upperCamelCase($route["controller"]);
                // Записываем в текущий маршрут
                self::$route = $route;

                return true;
            }
        }

        return false;
    }

    public static function dispatch($url)
    {
        self::removeQueryString($url);
        
        if(self::matchRoute($url)){
    
            if(self::$route["admin_prefix"] == "\\"){
                self::$route["admin_prefix"] = "";
            }

            // Путь к контроллеру 
            $controller = "app\controllers\\" . self::$route["admin_prefix"] . self::$route["controller"] . "Controller";

            // Проверяем, существует ли объект класса $controller
            if(class_exists($controller)){
                
                // создаём объект класса 
                $controllerObject = new $controller(self::$route);

                /** @var Controller $controllerObject */
                $controllerObject->getModel();
                
                // метод, который будет вызываться
                $action = lower_camelCase(self::$route["action"]);

                if(method_exists($controllerObject, $action)){
                    // Вызываем метод 
                    $controllerObject->$action();


                }else{
                    echo "<h1>Метод: {$controller}::{$action} не найден!</h1>";
                    die;    
                }
            }else{
                echo "<h1>Контроллер: {$controller} не найден!</h1>";
                die;    
            }

        }else{
            echo "<h1>Страница не найдена!</h1>";
            die;
        }
    }

}