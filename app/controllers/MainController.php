<?php

namespace app\controllers;

class MainController{

    public function __construct(public array $route = []){}

    public function index()
    {
        echo "<h2 style='color: red;'>Метод index у Контроллера MainController работает!</h2>";
    }
}