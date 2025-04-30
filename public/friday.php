<?php
include('../config/config.php');
$title = 'Är det fredag?';

include('../view/header.php');
?>

<?php
$inputDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$date = new DateTime($inputDate);
$dayNumber = $date->format('w');
?>

<main class="<?php echo ($dayNumber == 5) ? 'friday-page' : ''; ?>">
    <?php
    if ($dayNumber == 5) {
        echo '<h1>Det är FREDAG!!!</h1>';
        echo '<img src="img/friday.png" alt="Crazy Friday Image">';
        echo '<video width="600" height="240" controls autoplay muted loop>
                <source src="img/friday.mp4" type="video/mp4">
              Your browser does not support the video tag.
              </video>';
    } else {
        $nextFriday = new DateTime('next Friday');
        $interval = $date->diff($nextFriday);
        echo '<h2>Det är ' . $interval->days . ' dagar kvar till fredag...</h2>';
    }
    ?>
</main>
<script src="matrixRain.js"></script>
<?php include('../view/footer.php') ?>

