<?php
// search.php

include('../config/config.php');

include('../view/header.php');

// Initialize query from GET parameters
$query = $_GET['query'] ?? null;

// Connect to the database
//$fileName = "C:\db\db.sqlite";
$fileName = "../db/db.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

$results1 = [];
$results2 = [];

if ($query !== null) {
    // Sök i namnlista tabellen
    $sql1 = "SELECT * FROM namnlista WHERE namn LIKE :query";
    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([':query' => '%' . $query . '%']);
    $results1 = $stmt1->fetchAll();

    // Sök i namnbetydelse tabellen
    $sql2 = "SELECT * FROM namnbetydelse WHERE namn LIKE :query";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([':query' => '%' . $query . '%']);
    $results2 = $stmt2->fetchAll();
}

// Display the search input
?>
<div class="guess-container">
    <h1>Search the name database</h1>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Enter name to search"
            value="<?= htmlspecialchars((string) $query) ?>">
        <input type="submit" value="Search">
    </form>

    <?php

    // Display search results
    if ($query !== null) {
        if (!$results1 && !$results2) {
            echo "Ingen information om namnet kunde hittas.";
        } else {
            echo "<ul>";
            foreach ($results1 as $result) {
                echo "<li><a href='name.php?query=" . urlencode($result['namn']) . "'>" . htmlspecialchars($result['namn']) . "</a></li>";
            }
            foreach ($results2 as $result) {
                echo "<li><a href='name.php?query=" . urlencode($result['namn']) . "'>" . htmlspecialchars($result['namn']) . "</a></li>";
            }
            echo "</ul>";
        }
    }
    ?>
</div>
<?php

include('../view/footer.php') ?>

