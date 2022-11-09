<?php
require HLP_PATH . 'servicesList.php';
?>

<?php foreach ($servicesArr as $key => $item): ?>
<details id="<?= strtolower($item['id']) ?>" class="services-details">
    <summary class="services-details-summary"><p class="services-details-summary-p"><span class="summary-span">0<?=$key + 1?>.</span><?= $item['title'] ?></p></summary>
    <div class="services-details-body animate__animated animate__fadeIn">
        <?= $item['description'] ?>
    </div>
</details>
<?php endforeach; ?>
