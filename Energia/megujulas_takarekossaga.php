<?php
include 'connect.php';

if (isset($_GET['orszag_id'])) {
    $orszag_id = intval($_GET['orszag_id']);

    $orszag_sql = "SELECT nev FROM Orszagok WHERE orszag_id = $orszag_id";
    $orszag_result = $conn->query($orszag_sql);
    $orszag_nev = $orszag_result->fetch_assoc()['nev'] ?? 'Ismeretlen ország';

    $takarekossag_sql = "SELECT ev, hatekonysag_eredmeny, energia_megtakaritas_mwh, beruhazas_kolteseg
                    FROM Energiahatekonysag 
                    WHERE orszag_id = $orszag_id 
                    ORDER BY ev ASC";
    $takarekossag_result = $conn->query($takarekossag_sql);
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
                <h1>Ország Megujulo energia hatékonyság eredményei: <?php echo htmlspecialchars($orszag_nev); ?></h1>
            </div>
            <table id="countryTable">
                <thead>
                    <tr>
                    <th>Év</th>
                    <th>Hatékonyság eredménye (1-10)</th>
                    <th>Energia megtakarítás (Mwh)</th>
                    <th>Beruházási költség (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($takarekossag_result->num_rows > 0) {
                        while ($row = $takarekossag_result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ev']}</td>
                                    <td>{$row['hatekonysag_eredmeny']}</td>
                                    <td>{$row['energia_megtakaritas_mwh']}</td>
                                    <td>{$row['beruhazas_kolteseg']}</td>
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
