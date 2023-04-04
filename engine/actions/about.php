<?php

$title = Router::getLocale() === 'RU' ? 'О нас' : 'About Us';

$content = Router::view('about');
require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';