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
    <title>Fontosság</title>
</head>

<body>
    <header>
        <input type="text" id="searchBox" placeholder="Keresés az országok között...">
    </header>

    <main>
        <div class="wrapper">
            <div>
                <h1>Országok listája</h1>
            </div>

            <table id="countryTable">
                <thead>
                    <tr>
                        <th>Ország Név</th>
                        <th>A Megújuló Energia Hatékonysága</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['nev']}</td>
                                    <td><a href='megujulas_takarekossaga.php?orszag_id={$row['orszag_id']}'><button class='animated-button'>Hatékonyság<button></a></td>
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
    <script src="search.js"></script>

</html>
</body>

</html>