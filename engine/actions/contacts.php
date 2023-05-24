<?php

$title = Router::getLocale() === 'RU' ? 'Контакты' : 'Contacts';

$content = Router::view('contacts');

if (Router::getLocale() !== 'EN') {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.ru.layout.php';
} else {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';
}
