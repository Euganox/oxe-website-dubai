<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="user-scalable=no" />

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