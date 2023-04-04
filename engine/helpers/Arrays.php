<?php

class Arrays {
    public static function arrayGet(array $array, string $key, $default = null) {
        return $array[$key] ?? $default;
    }

    public static function arrayDebug($array) {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
    }
}