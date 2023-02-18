<?php

if (!function_exists('array_null_filter')) {
    function array_null_filter($array)
    {
        return array_filter($array, function ($item) {
            return $item !== null;
        });
    }
}
