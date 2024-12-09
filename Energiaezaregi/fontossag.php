<?php
include 'connect.php';
$sql = "SELECT orszag_id, nev, gdp, terulet_km2, fejlettsegi_szint FROM Orszagok";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
                <h1></h1>
            </div>

            <table id="countryTable">
                <thead>
                    <tr>
                        <th>Ország Név</th>
                        <th>Ugrás a megújuló energia fontosságára</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['nev']}</td>
                                    <td class='tdCountry'><button><a href='megujulas_takarekossaga.php?orszag_id={$row['orszag_id']}'>Fogyasztás</a></button></td>
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
