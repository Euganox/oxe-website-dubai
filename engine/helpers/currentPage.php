<?php

function currentPage(string $requestUri) : string {
    $requestUri = explode('?', $requestUri);
    $requestUri = $requestUri[0];
    $requestUri = explode('#', $requestUri);
    $requestUri = $requestUri[0];
    return trim($requestUri, '/');
}