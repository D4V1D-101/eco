<?php
include 'connect.php';

$country_id = $_GET['country_id'] ?? null;

if ($country_id) {

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

$pageName = "Production";
include 'head.php';
include 'header.php'; ?>

<main>
    <div class="wrapper">
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

<?php include 'footer.php'; ?>

<script src="search.js"></script>
</body>

</html>