<?php
include '../connect.php';

$sql = "SELECT i.investment_id, c.name as country_name, i.year, i.amount_usd, i.sector 
        FROM investments i 
        JOIN countries c ON i.country_id = c.country_id";
$result = $conn->query($sql);

$pageName = "Investments";
include '../semantic_lmnts/head.php';
include '../semantic_lmnts/header.php'; ?>

<main>
    <div class="wrapper">
        <table id="investmentTable">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Year</th>
                    <th>Amount (USD)</th>
                    <th>Sector</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td>{$row['country_name']}</td>
                                    <td>{$row['year']}</td>
                                    <td>{$row['amount_usd']}</td>
                                    <td>{$row['sector']}</td>
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

<?php include '../semantic_lmnts/footer.php'; ?>
<script src="../semantic_lmnts/search.js"></script>

</body>

</html>