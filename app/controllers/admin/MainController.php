<?php

namespace app\controllers\admin;

class MainController{

    public function __construct(public array $route = []){}

    public function index()
    {
        echo "<h2 style='color: red;'>Метод index у Контроллера admin/MainController работает!</h2>";
    }

}