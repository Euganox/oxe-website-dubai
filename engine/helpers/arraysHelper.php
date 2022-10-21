<?php

if(!function_exists('array_get')) {

    function array_get(array $array, string $key, $default = null) {
        return $array[$key] ?? $default;
    }
}

if(!function_exists('array_clean')) {
    /**
     * Clean array (htmlspecialchars & strip_tags)
     * @param array $arr
     * @return array
     **/
    function array_clean(array $arr):array {
        return array_map(function($it) {
            if(is_array($it)) {
                return array_clean($it);
            }
            return is_string($it) ? strip_tags(htmlspecialchars($it)) : $it;
        }, $arr);
    }

}

if(!function_exists('array_only')) {
    /**
     * Оставить только указанные ключи в массиве
     * Если ключ отсутствовал в исходном массиве, он не будет создан
     * @param array $arr - исходный массив
     * @param array $keys - список ключей которые нужно оставить
     * @return array
     **/
    function array_only(array $arr, array $keys):array {
        $data = [];
        foreach ($keys as $key) {
            if(isset($arr[$key])) {
                $data[$key] = $arr[$key];
            }
        }
        return $data;
    }

}