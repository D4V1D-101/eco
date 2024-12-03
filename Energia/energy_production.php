<?php
include 'connect.php';

// Get the country ID from the URL
$country_id = $_GET['country_id'] ?? null;

if ($country_id) {
    // Query to fetch production data for the selected country
    $sql = "SELECT ep.year, es.energy_type, ep.production_mwh
            FROM energy_production ep
            JOIN energy_sources es ON ep.energy_source_id = es.energy_source_id
            WHERE ep.country_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $country_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    die("Invalid or missing country ID.");
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Energy Production</title>
</head>

<body>
    <header>
        <h1>Energy Production</h1>
    </header>
    <main>
        <div class="wrapper">
            <div class="country">
                <h1>Countries</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Energy Type</th>
                        <th>Production (MWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['year']}</td>
                                <td>{$row['energy_type']}</td>
                                <td>{$row['production_mwh']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No production data available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Energy Data</p>
    </footer>
</body>

</html>