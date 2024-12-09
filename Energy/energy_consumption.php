<?php
include 'connect.php';

$country_id = $_GET['country_id'] ?? null;

if ($country_id) {

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

$pageName = "Consumption";
include 'head.php';
include 'header.php'; ?>
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>
<main>

    <div class="wrapper">
    <td><a href="countries.php"><button class="animated-button">Back</button></a></td>
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
<?php include 'footer.php'; ?>
<script src="cursor.js"></script>
<script src="search.js"></script>
</body>

</html>