<?php
$pageName = "Solar Farm Manager";
include 'head.php';
include 'header.php'; ?>
<div class="cursor-dot" data-cursor-dot></div>
<div class="cursor-outline" data-cursor-outline></div>
<main>
    <div id="game-container">
        <h1>Solar Farm Manager</h1>
        <p>Manage your solar farm and maximize energy production! Avoid clouds!</p>
        <div id="game-board"></div>
        <div id="controls">
            <button id="start-btn" class="animated-button">Start Game</button>
            <p>Energy: <span id="energy">0</span> kWh</p>
        </div>
    </div>
</main>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="game.js"></script>
<script src="cursor.js"></script>
<?php include 'footer.php'; ?>
</body>

</html>