<?php
include 'connect.php';

$sql = "SELECT i.investment_id, c.name as country_name, i.year, i.amount_usd, i.sector 
        FROM investments i 
        JOIN countries c ON i.country_id = c.country_id";
$result = $conn->query($sql);

$pageName = "Investments";
include 'head.php';
include 'header.php'; ?>
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>
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

<?php include 'footer.php'; ?>
<script src="search.js"></script>
<script src="cursor.js"></script>

</body>

</html>