<?php

function currentPage(string $requestUri) : string {
    return trim($requestUri, '/');
}