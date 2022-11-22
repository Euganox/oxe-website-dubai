<?php

$title = 'Каталог';

$districts = Sql::getDic('int_dubai_districts', false, 'code');
$typesOfAparts = Sql::getDic('int_dubai_typesApart', false, 'code');
$objects = Objects::objectsForCatalog();

$content = view('catalog', ['districts' => $districts, 'typesOfAparts' => $typesOfAparts, 'objects' => $objects]);
require TPL_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'main.layout.php';