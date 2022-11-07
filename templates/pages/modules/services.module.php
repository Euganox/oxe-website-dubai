<?php
require HLP_PATH . 'servicesList.php';
?>

<?php foreach ($servicesArr as $key => $item): ?>
<details class="services-details">
    <summary id="summary_<?=$key + 1?>"><?= $item['title'] ?></summary>
    <div class="services-details-body">
        <?= $item['description'] ?>
    </div>
</details>
<?php endforeach; ?>
