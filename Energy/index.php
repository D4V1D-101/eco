<?php
$pageName = "Index";
include 'head.php';
include 'header.php'; ?>
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>
<main>
    <div class="wrapper">
        <div class="welcome">
            <h1>Welcome to our site!</h1>
            <p>Every piece of data shown on this site is AI generated, <br> it does not resemble reality in any shape or form, <br> it is purely for entertainment purposes.</p><br>
            <h2>Total energy consumption chart:</h2>
            <canvas
                id="chartCanvas"
                width="500px"
                height="200px"
                style="background-color: cornflowerblue; border: 1px solid black">
            </canvas>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="chart.js"></script>
<script src="search.js"></script>
<script src="cursor.js"></script>
</body>

</html>