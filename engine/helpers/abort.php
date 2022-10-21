<?php

if(!function_exists('abort')) {
    function abort(int $code, string $message = 'Неизвестная ошибка') {
        http_response_code($code);
        require(TPL_PATH . 'layouts/error.layout.php');
        exit;
    }
}