<?php
// Adatbázis kapcsolat betöltése
require 'connect.php';

// Adatok lekérdezése a táblából
$query = "SELECT * FROM energiafogyasztas";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Hiba esetén JSON formátumban adjuk vissza a hibaüzenetet
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Hiba a lekérdezés végrehajtásakor!']);
    exit;
}

// Eredmények összegyűjtése
$energy_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $energy_data[] = $row;
}

// JSON válasz visszaadása
header('Content-Type: application/json');
echo json_encode($energy_data);

// Adatbázis kapcsolat bezárása
mysqli_close($conn);
