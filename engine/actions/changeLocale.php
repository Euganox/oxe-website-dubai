<?php

$from   = $_GET['from'] ?? '';
$locale = $_GET['locale'] ?? 'EN';

$_SESSION['locale'] = $locale;

header("Location: https://{$_SERVER['HTTP_HOST']}/$from");