<?php
include 'connect.php';

$sql = "SELECT t.progress_id, c.name as country_name, t.year, t.renewable_share, t.carbon_emissions 
        FROM transition_progress t 
        JOIN countries c ON t.country_id = c.country_id";
$result = $conn->query($sql);

$pageName = "Transition Progress";
include 'head.php';
include 'header.php'; ?>

<main>
    <div class="wrapper">
        <table id="progressTable">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Year</th>
                    <th>Renewable Share (%)</th>
                    <th>Carbon Emissions (tons)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td>{$row['country_name']}</td>
                                    <td>{$row['year']}</td>
                                    <td>{$row['renewable_share']}</td>
                                    <td>{$row['carbon_emissions']}</td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nothing to see here...</td></tr>";
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