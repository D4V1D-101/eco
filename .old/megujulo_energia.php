<?php
include 'connect.php';
if (isset($_GET['orszag_id'])) {
    $orszag_id = intval($_GET['orszag_id']);

    $orszag_sql = "SELECT nev FROM Orszagok WHERE orszag_id = $orszag_id";
    $orszag_result = $conn->query($orszag_sql);
    $orszag_nev = $orszag_result->fetch_assoc()['nev'] ?? 'Ismeretlen ország';

    $energia_sql = "SELECT ev, megujulo_fogyasztas_mwh,forraskategoria , epites_koltseg
                    FROM megujuloenergia
                    WHERE orszag_id = $orszag_id 
                    ORDER BY ev ASC";
    $energia_result = $conn->query($energia_sql);
} else {
    echo "Érvénytelen ország azonosító.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo htmlspecialchars($orszag_nev); ?></title>
</head>

<body>
    <header>

    </header>

    <main>
        <div class="wrapper">
            <div class="country">
                <h1>Országadatok</h1>
            </div>

            <table id="countryTable">
                <thead>
                    <tr>
                        <th>Év</th>
                        <th>Megújuló fogyasztás (MWh)</th>
                        <th>Forráskategória</th>
                        <th>Építési költéség (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($energia_result->num_rows > 0) {
                        while ($row = $energia_result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ev']}</td>
                                    <td>{$row['megujulo_fogyasztas_mwh']}</td>
                                    <td>{$row['forraskategoria']}</td>
                                    <td>{$row['epites_koltseg']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nincs megjeleníthető adat</td></tr>";
                    }
                    ?>
                </tbody>
                <td><a href="orszagok.php"><button class="animated-button">Vissza</button></a></td>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Országadatok Megjelenítése</p>
    </footer>

</html>
</body>

</html>