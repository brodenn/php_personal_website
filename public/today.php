<?php
include('../config/config.php');

$title = 'Today';

date_default_timezone_set('Europe/Stockholm');

$today = date('Y-m-d H:i:s');

$weekday = date('l');

$weekNumber = date('W');

include('../view/header.php');
?>

<main>
    <h1 class="today-heading">
        <?= $weekday ?>
    </h1>
    <p>Dagens datum och tid är <span>
            <?= $today ?>
        </span>.</p>
    <p>Veckonummer: <span>
            <?= $weekNumber ?>
        </span></p>
</main>


<?php
include('../view/footer.php');
?>

