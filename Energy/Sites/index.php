<?php
$pageName = "Index";
include '../semantic_lmnts/head.php';
include '../semantic_lmnts/header.php'; ?>

<main>
    <div class="wrapper">
        <div class="welcome">
            <h1>Welcome to our site!</h1>
            <canvas
                id="chartCanvas"
                width="500px"
                height="200px"
                style="background-color: cornflowerblue; border: 1px solid black">
            </canvas>
        </div>
    </div>
</main>

<?php include '../semantic_lmnts/footer.php'; ?>

<script src="../JavaScript/chart.js"></script>
<script src="../JavaScript/search.js"></script>
</body>

</html>