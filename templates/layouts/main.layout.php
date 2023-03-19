<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon" sizes="57x57" href="/public/assets/general/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/public/assets/general/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/assets/general/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/assets/general/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/assets/general/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/assets/general/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/assets/general/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/assets/general/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/public/assets/general/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/assets/general/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/assets/general/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/general/favicon-16x16.png">
    <link rel="manifest" href="/public/assets/general/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/public/assets/general/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php require TPL_PATH . 'layouts/helpers/requires.head.php' ?>

    <title>OXE GROUP<?= isset($title) ? ' - ' . $title : '' ?></title>
</head>
<body>
    <?php require TPL_PATH . 'elements/header.el.php' ?>

    <?= isset($content) && !empty($content) ? $content : '' ?>

    <?php require TPL_PATH . 'elements/footer.el.php' ?>

    <?php require TPL_PATH . 'layouts/helpers/requires.bottom.php' ?>
</body>
</html>