<?php

require "src/database.php";

// Hämta söksträngen
$query = $_GET['query'] ?? null;

// Om ingen query är tillhandahållen, visa ett meddelande
if ($query === null) {
    echo "Du måste fylla i söksträngen.";
    exit;
}

// Anslut till databasen
$fileName = "C:\db\db.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

// Sök i tabellen namnlista
$sql1 = "SELECT * FROM namnlista WHERE namn LIKE ?";
$stmt1 = $db->prepare($sql1);
$stmt1->execute(["%$query%"]);
$results1 = $stmt1->fetchAll();

// Sök i tabellen namnbetydelse
$sql2 = "SELECT * FROM namnbetydelse WHERE namn LIKE ?";
$stmt2 = $db->prepare($sql2);
$stmt2->execute(["%$query%"]);
$results2 = $stmt2->fetchAll();

// Om inga resultat hittades, visa ett meddelande
if (empty($results1) && empty($results2)) {
    echo "Ingen information om namnet kunde hittas.";
    exit;
}

// Visa sökresultaten
require "view/searchResults.php";
