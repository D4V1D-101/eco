<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Főoldal</title>
</head>

<body>
    <header>
        <div class="header-container">
            <!-- Navigációs menü -->
            <select id="dropdown" onchange="window.location.href=this.value;">
                <option value="#">Válasszon...</option>
                <option value="index.php">Index</option>
                <option value="orszagok.php">Országok</option>
                <option value="fontossag.php">Fontosság</option>
            </select>
        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="welcome">
                <h1>Üdvözöljük a főoldalon!</h1>
                <p>Ez az oldal a rendszer belépési felülete.</p>
                <canvas
                    id="chartCanvas"
                    width="500px"
                    height="200px"
                    style="background-color: cornflowerblue; border: 1px solid black">
                </canvas>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Főoldal Megjelenítése</p>
    </footer>

    <script>
        const dataUrl = "http://localhost/3ECO/Energia/energy_data.php";

        fetch(dataUrl)
            .then(function(response) {
                console.log(response);
                return response.json();
            })
            .then(function(jsonData) {
                console.log(jsonData);
                const xValues = jsonData.map(function(item) {
                    return item.orszag_id;
                });
                console.log(xValues);
                const yValues = jsonData.map(function(item) {
                    return item.fogyasztas_mwh;
                });
                console.log(yValues);

                //színek megadása
                const barColor = ["black", "darkgray", "lightgray", "gray", "white"];

                //chart diagramm
                const ctx = document.getElementById("chartCanvas").getContext("2d");
                const chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            label: "Energia fogyasztás",
                            data: yValues,
                            backgroundColor: barColor,
                        }, ],
                    },
                });
            });
    </script>
</body>

</html>