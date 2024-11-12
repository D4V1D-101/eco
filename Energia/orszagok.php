<?php
include 'connect.php';


$sql = "SELECT orszag_id, nev, gdp, terulet_km2, fejlettsegi_szint FROM Orszagok";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Országadatok Megjelenítése</title>
</head>
<body>
    <h1>Országadatok</h1>

    <table>
        <tr>
            <th>Ország Név</th>
            <th>GDP (millió USD)</th>
            <th>Terület (km²)</th>
            <th>Fejlettségi Szint</th>
        </tr>
        
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><a href='orszag_reszletek.php?orszag_id={$row['orszag_id']}'>{$row['nev']}</a></td>
                        <td>{$row['gdp']}</td>
                        <td>{$row['terulet_km2']}</td>
                        <td>{$row['fejlettsegi_szint']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nincs megjeleníthető adat</td></tr>";
        }
        ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
