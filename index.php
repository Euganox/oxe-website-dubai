<?php

const DOCROOT = __DIR__ . DIRECTORY_SEPARATOR;
const SETTINGS_PATH = DOCROOT . 'config' . DIRECTORY_SEPARATOR;

const TPL_PATH = DOCROOT . 'templates' . DIRECTORY_SEPARATOR;
const MOD_PATH = TPL_PATH . 'pages' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;

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
$currentPage = currentPage($_SERVER["REQUEST_URI"]);

if (isset($_GET['ajax'])) {
    include HLP_PATH . 'ajax.php';
    exit();
}

// Маршрутизатор. Пока такой
$uriArr = array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), fn($it) => boolval($it))) ;

$currentAction = array_get($uriArr, 0, 'home');
$actionPath = ACT_PATH . $currentAction;

if(is_dir($actionPath)) {
    $fileName = array_get($uriArr, 1, $currentAction);
    $actionPath .= '/' . $fileName;
}

$filePath = $actionPath . '.php';
if (!file_exists($filePath)) {
    $log = 'Пользователь попытался войти на страницу ' . $currentAction . '.';
    // writeLogDB('access', $log);
    abort(404, 'Страница не найдена');
}

require $filePath;