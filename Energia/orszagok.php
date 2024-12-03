<?php
include 'connect.php';

$sql = "SELECT country_id, name, iso_alpha3, area_km2, population, gdp, hdi, developement_level FROM countries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Countries</title>
</head>

<body>
    <header>
        <div class="header-container">
            <select id="dropdown" onchange="window.location.href=this.value;">
                <option value="#">Choose</option>
                <option value="index.php">Index</option>
                <option value="orszagok.php">Countries</option>
                <option value="fontossag.php">Anyád</option>
            </select>

            <input type="text" id="searchBox" placeholder="Search for countries...">
        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="country">
                <h1>Countries</h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Iso Alpha3</th>
                        <th>Consumption</th>
                        <th>Production</th>
                        <th>Area (km²)</th>
                        <th>Population</th>
                        <th>GDP</th>
                        <th>HDI</th>
                        <th>Developement Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['iso_alpha3']}</td>
                                    <td><a href='energy_consumption.php?country_id={$row['country_id']}'><button class='animated-button'>Consumption</button></a></td>
                                    <td><a href='energy_production.php?country_id={$row['country_id']}'><button class='animated-button'>Production</button></a></td>
                                    <td>{$row['area_km2']}</td>
                                    <td>{$row['population']}</td>
                                    <td>{$row['gdp']}</td>
                                    <td>{$row['hdi']}</td>
                                    <td>{$row['developement_level']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nothing to see here...</td></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Country data</p>
    </footer>
    <script src="search.js"></script>

</html>
</body>

</html>