<?php 

$title = Router::getLocale() === 'RU' ? 'Главная' : 'Home';

$content = Router::view('home');
require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';