<?php

namespace app\controllers\admin;

use Classes\Controller;

class MainController extends Controller{

    public function index()
    {
        echo "<h2 style='color: red;'>Метод index у Контроллера admin/MainController работает!</h2>";
    }

}