<?php

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function upperCamelCase($str)
{
    $str = str_replace(' ', '', 
        ucwords(str_replace(['-', '_'], 
        ' ', $str))
    );

    return $str;
}

function lower_camelCase($str)
{
    return lcfirst(upperCamelCase($str));
}