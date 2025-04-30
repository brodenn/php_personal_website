<?php
// name.php

include('../config/config.php');

include('../view/header.php');
?>

<div class="guess-container">

    <?php
    $name = $_GET['query'] ?? null;

    if ($name === null) {
        echo "No name provided.";
        exit;
    }
    $fileName = "../db/db.sqlite";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\\db\\db.sqlite";
    }
    $dsn = "sqlite:$fileName";

    $db = connectToDatabase($dsn);

    // Query the namnlista table
    $sql1 = "SELECT * FROM namnlista WHERE namn = :name";
    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([':name' => $name]);
    $result1 = $stmt1->fetch();

    // Query the namnbetydelse table
    $sql2 = "SELECT * FROM namnbetydelse WHERE namn = :name";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([':name' => $name]);
    $result2 = $stmt2->fetch();

    if (!$result1 && !$result2) {
        echo "Ingen information om namnet kunde hittas.";
    } else {
        if ($result1) {
            echo "<h2>Details from namnlista:</h2>";
            echo "Name: " . htmlspecialchars($result1['namn']) . "<br>";
            echo "Date: " . htmlspecialchars($result1['datum']) . "<br>";
            echo "Namnlangd: " . htmlspecialchars($result1['namnlangd']) . "<br><br>";
        }

        if ($result2) {
            echo "<h2>Details from namnbetydelse:</h2>";
            echo "Name: " . htmlspecialchars($result2['namn']) . "<br>";
            echo "Betydelse: " . htmlspecialchars($result2['betydelse']) . "<br><br>";
        }
    }
    ?>

    <a href="search.php">Go back to search</a>

</div> <!-- End of container -->

<?php include('../view/footer.php') ?>

