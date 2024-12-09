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
    <link rel="stylesheet" href="style.css">
    <title>Országadatok Megjelenítése</title>
</head>

<body>
    <header>
        <div class="headerContainer">
            <a href="fontossag.php">Megujuló Energia Fontossága</a>
            <input type="text" id="searchBox" placeholder="Keresés az országok között...">
        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="country">
                <h1>Országadatok</h1>
            </div>

            <table id="countryTable">
                <thead>
                    <tr>
                        <th>Ország Név</th>
                        <th>GDP (millió USD)</th>
                        <th>Terület (km²)</th>
                        <th>Fejlettségi Szint</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td class='tdCountry'>{$row['nev']} 
                                        <div class='tdButtons'>
                                        <button><a href='orszag_reszletek.php?orszag_id={$row['orszag_id']}'>Fogyasztás</a></button>
                                        <button><a href='megujjulo_energia.php?orszag_id={$row['orszag_id']}'>Megújuló energia</a></button>
                                        </div>
                                    </td>
                                    <td>{$row['gdp']}</td>
                                    <td>{$row['terulet_km2']}</td>
                                    <td>{$row['fejlettsegi_szint']}</td>
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
    <script src="search.js"></script>
</html>
</body>

</html>