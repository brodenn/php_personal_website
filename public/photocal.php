<?php
// photocal.php

// Include calendar.php to access getNameDaysByName()
include '../src/calendar.php';

$images = [
    '01' => 'jan.jpg',
    '02' => 'feb.jpg',
    '03' => 'mar.jpg',
    '04' => 'apr.jpg',
    '05' => 'may.jpg',
    '06' => 'jun.jpg',
    '07' => 'jul.jpg',
    '08' => 'aug.jpg',
    '09' => 'sep.jpg',
    '10' => 'oct.jpg',
    '11' => 'nov.jpg',
    '12' => 'dec.jpg'
];

// Get the name days
$nameDays = getNameDaysByNameFull();

$date = $_GET['date'] ?? date('Y-m-d');
$year = date('Y', strtotime($date));
$month = date('m', strtotime($date));

$image = $images[$month] ?? 'default.jpg';

$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Calculate the day of the week for the first day of the month (0 = Sunday, 1 = Monday, etc.)
$firstDayOfMonth = date('w', mktime(0, 0, 0, $month, 1, $year));

// Adjust $firstDayOfMonth to start on Monday (1)
$firstDayOfMonth = ($firstDayOfMonth == 0) ? 7 : $firstDayOfMonth;

include('../config/config.php');

include('../view/header.php');
?>

<div class="calendar-container">
    <a class="prev-month" href="?date=<?php echo date('Y-m-d', strtotime($date . ' -1 month')); ?>">&lt; Tidigare
        månad</a>
    <img src="img/<?php echo $image; ?>" alt="Month Image" width="150" height="150" />
    <a class="next-month" href="?date=<?php echo date('Y-m-d', strtotime($date . ' +1 month')); ?>">Nästa månad &gt;</a>
    <h1>
        <?php echo date('F Y', strtotime($date)); ?>
    </h1>
    <table border="1">
        <tr>
            <th>Mån</th>
            <th>Tis</th>
            <th>Ons</th>
            <th>Tors</th>
            <th>Fre</th>
            <th>Lör</th>
            <th class="sunday">Sön</th>
        </tr>
        <tr>
            <?php
            // Print empty cells before the first day of the month
            for ($i = 1; $i < $firstDayOfMonth; $i++) {
                echo "<td></td>";
            }

            // Print the days of the month
            for ($day = 1; $day <= $numDays; $day++) {
                // Check if we need to start a new row
                if ($i % 7 == 1) {
                    echo "</tr><tr>";
                }

                // Determine if it's a Sunday for styling
                $isSunday = $i % 7 == 0 ? 'class="sunday"' : '';

                // Check if there's a name day for this date
                $currentDate = "$year-$month-" . str_pad($day, 2, "0", STR_PAD_LEFT);
                $nameDay = null;

                foreach ($nameDays as $name => $dateInfo) {
                    list($csvDay, $csvMonth) = explode('/', $dateInfo[1]);
                    if ($csvDay == $day && $csvMonth == $month) {
                        $nameDay = $name;
                        break;
                    }
                }

                // Print the cell
                echo "<td $isSunday>";

                // Print the day number
                echo $day;

                // Check if there's a name day for this date and display it
                if ($nameDay) {
                    echo "<br><span class='name-day'>$nameDay</span>";
                }

                echo "</td>";
                $i++;
            }

            // Print empty cells to complete the last row if necessary
            while ($i % 7 != 1) {
                echo "<td></td>";
                $i++;
            }
            ?>
        </tr>
    </table>
</div>
<?php

include('../view/footer.php');
?>
