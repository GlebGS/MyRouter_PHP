<?php

namespace Classes;

abstract class Controller{

    public $model;

    public function __construct(public $route = []){}

    public function getModel(){

        $model = "app\models\\" . $this->route["admin_prefix"] . $this->route["controller"];
        if(class_exists($model)){
            echo "TRUE MODEL";
            $this->model = new $model();
        }
    }

}