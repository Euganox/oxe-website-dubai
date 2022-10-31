<?php
$mediaQueries = [1550, 1024, 768, 736, 667, 414, 375, 320];

?>


<link rel="stylesheet" href="/public/assets/styles/fonts.css">
<link rel="stylesheet" href="/public/assets/styles/basic.css">
<link rel="stylesheet" href="/public/assets/styles/styles.css">
<?php foreach ($mediaQueries as $mediaQuery): ?>
    <link rel="stylesheet" href="/public/assets/styles/media-queries/media<?= $mediaQuery ?>px.css">
<?php endforeach; ?>

<link rel="stylesheet" href="/public/assets/js/fatNav/jquery.fatNav.css">
<link rel="stylesheet" href="/public/assets/js/pieTimer/pietimer.css">
<link rel="stylesheet" href="/public/assets/js/lightSlider/lightslider.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

