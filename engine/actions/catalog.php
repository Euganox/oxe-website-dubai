<?php

$title = Router::getLocale() === 'RU' ? 'Каталог' : 'Catalog';

$districts = Sql::getDic('int_dubai_districts', false, 'code');
$typesOfAparts = Sql::getDic('int_dubai_typesApart', false, 'code');
$typesOfRealty = Sql::getDic('int_dubai_typesRealty', false, 'code');

if (isset($_GET) && !empty($_GET)) {
    $objects = Objects::objectsForCatalog($_GET);
} else {
    $objects = Objects::objectsForCatalog();
}

$objectsForMapModule = Objects::getAllObjects();

$content = Router::view('catalog', ['districts' => $districts, 'objects' => $objects, 'typesOfAparts' => $typesOfAparts, 'typesOfRealty' => $typesOfRealty, 'objectsForMap' => $objectsForMapModule]);

if (Router::getLocale() === 'RU') {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.ru.layout.php';
} else {
    require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';
}