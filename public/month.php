<?php
include('../config/config.php');
$title = 'Månadskalender';

include('../view/header.php');
?>

<main class="month-page">
    <form method="get">
        <label for="date">Välj ett datum:</label>
        <input type="date" name="date" id="date" value="<?= isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') ?>">
        <input type="submit" value="Visa kalender">
    </form>

    <?php
    $inputDate = isset($_GET['date']) ? new DateTime($_GET['date']) : new DateTime();

    // Start and end dates for the current month
    $firstDayOfMonth = (clone $inputDate)->modify('first day of this month');
    $lastDayOfMonth = (clone $inputDate)->modify('last day of this month');

    echo "<h1>" . $firstDayOfMonth->format('F Y') . "</h1>";

    echo "<div class='nav-links'>";
    echo "<a href=\"?date=" . $firstDayOfMonth->modify('-1 day')->format('Y-m-d') . "\">Föregående månad</a>";
    echo " | ";
    echo "<a href=\"?date=" . $lastDayOfMonth->modify('+1 day')->format('Y-m-d') . "\">Nästa månad</a>";
    echo "</div>";

    echo "<table>";
    $currentDay = clone $firstDayOfMonth;
    while ($currentDay <= $lastDayOfMonth) {
        echo "<tr>";

        // If it's the first day of the month or a Monday, display the week number
        if ($currentDay == $firstDayOfMonth || $currentDay->format('N') == 1) {
            echo "<td>" . $currentDay->format('W') . "</td>";
        } else {
            echo "<td></td>";
        }

        echo "<td " . ($currentDay->format('N') == 7 ? 'class="sunday"' : '') . ">" . $currentDay->format('d') . "</td>";
        echo "<td " . ($currentDay->format('N') == 7 ? 'class="sunday"' : '') . ">" . $currentDay->format('D') . "</td>";
        echo "<td>" . $currentDay->format('z') . "</td>";
        echo "</tr>";

        $currentDay->modify('+1 day');
    }
    echo "</table>";
    ?>
</main>

<?php include('../view/footer.php') ?>

