<?php

$json = Objects::getGeoJSONObjects();


if (isset($_GET['decode']) & !empty($_GET['decode'])) {
    echo '<pre>';
    print_r($json);
    echo '</pre>';
} else {
    header("Content-Type: application/json;charset=utf-8");
    header('Content-Encoding: gzip');
    ob_start('ob_gzhandler');
    echo json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}