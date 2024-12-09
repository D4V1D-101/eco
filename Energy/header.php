<header>
    <div class="header-container">
        <select id="dropdown" onchange="window.location.href=this.value;">
            <option value="#">Choose...</option>
            <option value="index.php">Index</option>
            <option value="countries.php">Countries</option>
            <option value="solar.php">Solar Game</option>
            <option value="energy_sources.php">Energy Sources</option>
            <option value="investments.php">Investments</option>
            <option value="transition_progress.php">Transition Prgoress</option>
        </select>

        <h1><?php echo $pageName ?></h1>

        <input type="text" id="searchBox" placeholder="Search here...">
    </div>
</header>