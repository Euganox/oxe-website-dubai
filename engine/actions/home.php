<?php 

$title = Router::getLocale() === 'RU' ? 'Главная' : 'Home';

$content = Router::view('home');

if (Router::getLocale() === 'RU') {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.ru.layout.php';
} else {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';
}

