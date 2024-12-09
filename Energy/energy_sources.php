<?php
include 'connect.php';

$sql = "SELECT energy_source_id, renewable, origin, energy_type, description, environmental_effect FROM energy_sources";
$result = $conn->query($sql);

$pageName = "Energy Sources";
include 'head.php';
include 'header.php'; ?>
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>
<main>
    <div class="wrapper">
    <td><a href="index.php"><button class="animated-button">Back</button></a></td>
        <table id="energySourceTable">
            <thead>
                <tr>
                    <th>Renewable</th>
                    <th>Origin</th>
                    <th>Energy Type</th>
                    <th>Description</th>
                    <th>Environmental Effect</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td>" . ($row['renewable'] ? 'Yes' : 'No') . "</td>
                                    <td>{$row['origin']}</td>
                                    <td>{$row['energy_type']}</td>
                                    <td>{$row['description']}</td>
                                    <td>{$row['environmental_effect']}</td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nothing to see here...</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="search.js"></script>
<script src="cursor.js"></script>
</body>

</html>