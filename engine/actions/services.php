<?php

$title = Router::getLocale() === 'RU' ? 'Услуги' : 'Services';

$content = Router::view('services');
require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';