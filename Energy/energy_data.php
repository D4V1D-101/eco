<?php
require 'connect.php';

$query = "SELECT ec.country_id, c.name AS country_name, SUM(ec.consumption_mwh) AS total_consumption
        FROM energy_consumption ec
        JOIN countries c ON ec.country_id = c.country_id
        GROUP BY ec.country_id, c.name
        ORDER BY total_consumption DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Hiba a lekérdezés végrehajtásakor!']);
    exit;
}

$energy_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $energy_data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($energy_data);

mysqli_close($conn);
