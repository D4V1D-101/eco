<?php
include '../connect.php';

$sql = "SELECT energy_source_id, renewable, origin, energy_type, description, environmental_effect FROM energy_sources";
$result = $conn->query($sql);

$pageName = "Energy Sources";
include '../semantic_lmnts/head.php';
include '../semantic_lmnts/header.php'; ?>

<main>
    <div class="wrapper">
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

<?php include '../semantic_lmnts/footer.php'; ?>
<script src="../JavaScript/search.js"></script>

</body>

</html>