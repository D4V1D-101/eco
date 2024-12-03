<?php
include 'connect.php';

// Get the country ID from the URL
$country_id = $_GET['country_id'] ?? null;

if ($country_id) {
    // Query to fetch consumption data for the selected country
    $sql = "SELECT ec.year, es.energy_type, ec.consumption_mwh
            FROM energy_consumption ec
            JOIN energy_sources es ON ec.energy_source_id = es.energy_source_id
            WHERE ec.country_id = ?";
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
    <title>Energy Consumption</title>
</head>

<body>
    <header>
        <h1>Energy Consumption</h1>
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
                        <th>Consumption (MWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['year']}</td>
                                <td>{$row['energy_type']}</td>
                                <td>{$row['consumption_mwh']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No consumption data available.</td></tr>";
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