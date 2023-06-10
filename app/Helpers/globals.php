<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('array_null_filter')) {
    function array_null_filter($array)
    {
        return array_filter($array, function ($item) {
            return $item !== null;
        });
    }
}

if (! function_exists('routeName')) {
    function routeName($name)
    {
        return Route::current()->getName() == $name;
    }
}
