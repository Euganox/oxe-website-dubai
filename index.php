<?php

const DOCROOT = __DIR__ . DIRECTORY_SEPARATOR;
const SETTINGS_PATH = DOCROOT . 'config' . DIRECTORY_SEPARATOR;

const TPL_PATH = DOCROOT . 'templates' . DIRECTORY_SEPARATOR;
const MOD_PATH = TPL_PATH . 'pages' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;
const RU_MOD_PATH = TPL_PATH . 'pages/ru' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;

const ENG_PATH = DOCROOT . 'engine' . DIRECTORY_SEPARATOR;
const ACT_PATH = ENG_PATH . 'actions' . DIRECTORY_SEPARATOR;
const HLP_PATH = ENG_PATH . 'helpers' . DIRECTORY_SEPARATOR;
const IMG_PATH = DOCROOT . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

require SETTINGS_PATH . 'database/DB.php';
require SETTINGS_PATH . 'database/Sql.php';
require SETTINGS_PATH . 'database/Objects.php';
require SETTINGS_PATH . 'settingsGeneral.php';

require HLP_PATH . 'abort.php';
require HLP_PATH . 'arraysHelper.php';
require HLP_PATH . 'view.php';
require HLP_PATH . 'currentPage.php';
require HLP_PATH . 'text.php';
require HLP_PATH . 'Router.php';
require HLP_PATH . 'Arrays.php';

$currentPage = currentPage($_SERVER["REQUEST_URI"]);

session_start([
    'cookie_lifetime' => 86400,
]);

if (isset($_GET['ajax'])) {
    include HLP_PATH . 'ajax.php';
    exit();
} else if (isset($_GET['ajaxRu'])) {
    include HLP_PATH . 'ajax.ru.php';
    exit();
}

// Router::abort(404, 'COMING SOON');
Router::route();