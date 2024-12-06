<?php
include 'connect.php';

$sql = "SELECT country_id, name, iso_alpha3, area_km2, population, gdp, hdi, developement_level FROM countries";
$result = $conn->query($sql);

$pageName = "Countries";
include 'head.php';
include 'header.php'; ?>

<main>
    <div class="wrapper">
        <table id="countryTable">
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
                                    <td style='text-align: center;'>{$row['developement_level']}</td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nothing to see here...</td></tr>";
                } ?>
            </tbody>
            <td><a href="index.php"><button class="animated-button">Back</button></a></td>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="search.js"></script>

</html>
</body>