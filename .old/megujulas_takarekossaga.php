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
    <title><?php echo htmlspecialchars($orszag_nev); ?></title>
</head>

<body>
    <header>

    </header>

    <main>
        <div class="wrapper">
            <div>
                <h1><?php echo htmlspecialchars($orszag_nev); ?></h1>
            </div>
            <table>
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
                <td><a href="fontossag.php"><button class="animated-button">Vissza</button></a></td>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Országadatok Megjelenítése</p>
    </footer>

</html>
</body>

</html>