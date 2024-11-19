<?php
include 'connect.php';

if (isset($_GET['orszag_id'])) {
    $orszag_id = intval($_GET['orszag_id']);

    $orszag_sql = "SELECT nev FROM Orszagok WHERE orszag_id = $orszag_id";
    $orszag_result = $conn->query($orszag_sql);
    $orszag_nev = $orszag_result->fetch_assoc()['nev'] ?? 'Ismeretlen ország';

    $energia_sql = "SELECT ev, fogyasztas_mwh, egy_fore_juto_fogyasztas, nepesseg
                    FROM Energiafogyasztas 
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
    <title>Ország Részletek: <?php echo htmlspecialchars($orszag_nev); ?></title>
</head>
<body>
    <header>
        <div class="headerContainer">
        <a href="orszagok.php">Vissza az országok listájához</a>
        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="country">
                <h1>Ország Részletek: <?php echo htmlspecialchars($orszag_nev); ?></h1>
            </div>
            <table id="countryTable">
                <thead>
                    <tr>
                    <th>Év</th>
                    <th>Fogyasztás (MWh)</th>
                    <th>Népesség</th>
                    <th>Egy főre jutó fogyasztás (MWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($energia_result->num_rows > 0) {
                        while ($row = $energia_result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ev']}</td>
                                    <td>{$row['fogyasztas_mwh']}</td>
                                    <td>{$row['nepesseg']}</td>
                                    <td>{$row['egy_fore_juto_fogyasztas']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nincs megjeleníthető adat</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <div class="footerontainer">
            <p>&copy; <?php echo date('Y'); ?> Országadatok Megjelenítése</p>
        </div>
    </footer>
</html>
</body>
</html>
