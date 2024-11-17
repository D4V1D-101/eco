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
    <title>Ország Részletek: <?php echo htmlspecialchars($orszag_nev); ?></title>
</head>
<body>
    <h1>Ország Részletek: <?php echo htmlspecialchars($orszag_nev); ?></h1>

    <table>
        <tr>
            <th>Év</th>
            <th>Megujjuló fogyasztás (MWh)</th>
            <th>Forráskategória</th>
            <th>építési költéség </th>
        </tr>
        
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
            echo "<tr><td colspan='3'>Nincs megjeleníthető adat</td></tr>";
        }
        ?>
    </table>

    <a href="orszagok.php">Vissza az országok listájához</a>

    <?php $conn->close(); ?>
</body>
</html>
