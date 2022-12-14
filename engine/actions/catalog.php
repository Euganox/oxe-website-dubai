<?php

$title = 'Каталог';

$districts = Sql::getDic('int_dubai_districts', false, 'code');
$typesOfAparts = Sql::getDic('int_dubai_typesApart', false, 'code');

if (isset($_GET) && !empty($_GET)) {
    $objects = Objects::objectsForCatalog($_GET);
} else {
    $objects = Objects::objectsForCatalog();
}

$objectsForMapModule = Objects::getAllObjects();

$content = view('catalog', ['districts' => $districts, 'objects' => $objects, 'typesOfAparts' => $typesOfAparts, 'objectsForMap' => $objectsForMapModule]);
require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';