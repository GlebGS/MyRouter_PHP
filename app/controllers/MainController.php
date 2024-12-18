<?php

namespace app\controllers;

use Classes\Controller;

class MainController extends Controller{

    public function index()
    {
        echo "<h2 style='color: red;'>Метод index у Контроллера MainController работает!</h2>";
    }
}