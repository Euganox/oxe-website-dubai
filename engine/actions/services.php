<?php

$title = Router::getLocale() === 'RU' ? 'Услуги' : 'Services';

$content = Router::view('services');

if (Router::getLocale() === 'RU') {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.ru.layout.php';
} else {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';
}