let energy = 0;
let gameStarted = false;
let gameOver = false;  // New flag to track game over state

const gameBoard = document.getElementById("game-board");
const energyDisplay = document.getElementById("energy");
const startBtn = document.getElementById("start-btn");

const boardWidth = 600;
const boardHeight = 400;
const panelWidth = 100;
const panelHeight = 100;
let panels = [];
let clouds = [];  // Array to keep track of clouds

// Function to generate energy from a solar panel
function generateEnergy() {
    if (gameOver) return;  // Prevent generating energy if the game is over
    energy += 10;  // Each panel generates 10 kWh per tick
    energyDisplay.textContent = energy;
}

// Function to create a solar panel with the sun sprite
function createSolarPanel(x, y) {
    if (gameOver) return;  // Don't create panels if the game is over

    const panel = document.createElement('div');
    panel.style.position = 'absolute';
    panel.style.width = `${panelWidth}px`;
    panel.style.height = `${panelHeight}px`;
    panel.style.backgroundImage = 'url("sun.png")'; // Set the sun sprite as the background
    panel.style.backgroundSize = 'contain'; // Ensure the sprite fits within the panel
    panel.style.backgroundRepeat = 'no-repeat'; // Prevent the image from repeating
    panel.style.backgroundPosition = 'center'; // Center the image in the div
    panel.style.top = `${y}px`;
    panel.style.left = `${x}px`;
    panel.classList.add('solar-panel');
    gameBoard.appendChild(panel);
    panels.push(panel);

    // Start a timer for 3 seconds when the panel is created
    const timer = setTimeout(() => {
        if (panel.parentElement) {
            // If the panel is still in the game board, the player missed it
            gameOver = true;
            endGame();  // Trigger game over
            panel.remove();  // Remove the panel from the board
            removeAllGameObjects();  // Remove all other game objects (clouds, panels)
        }
    }, 3000); // 3 seconds timer

    // Event listener for panel click
    panel.addEventListener('click', () => {
        if (gameOver) return; // Prevent interaction if game is over
        generateEnergy();
        clearTimeout(timer); // Clear the timer if clicked
        panel.remove(); // Remove panel after collecting energy
    });
}

// Function to create a cloud with the cloud sprite
function createClouds() {
    if (gameOver) return;  // Don't create clouds if the game is over

    const cloud = document.createElement('div');
    cloud.style.position = 'absolute';
    cloud.style.width = `${Math.random() * 150 + 100}px`;
    cloud.style.height = '80px';
    cloud.style.backgroundImage = 'url("toxic.png")'; // Set the cloud sprite as the background
    cloud.style.backgroundSize = 'contain'; // Ensure the sprite fits within the panel
    cloud.style.backgroundRepeat = 'no-repeat'; // Prevent the image from repeating
    cloud.style.backgroundPosition = 'center'; // Center the image in the div    panel.style.top = `${y}px`;
    cloud.style.top = `${Math.random() * (boardHeight - 100)}px`;
    cloud.style.left = `${Math.random() * (boardWidth - 150)}px`;
    gameBoard.appendChild(cloud);
    clouds.push(cloud);

    // Event listener for cloud click (Game Over)
    cloud.addEventListener('click', () => {
        if (gameOver) return; // Ignore clicks if the game is over
        gameOver = true;  // Set game over flag
        endGame();  // End the game
        removeAllGameObjects();  // Remove all game objects when the game ends
    });

    // Remove cloud after 3 seconds
    setTimeout(() => {
        cloud.remove();
    }, 3000);
}

// Function to remove all game objects (clouds and panels) from the board
function removeAllGameObjects() {
    panels.forEach(panel => panel.remove());
    clouds.forEach(cloud => cloud.remove());
    panels = [];
    clouds = [];
}

// Function to end the game using SweetAlert2
function endGame() {
    if (gameOver) {
        // Show SweetAlert only once
        Swal.fire({
            title: 'Game Over!',
            text: 'You missed a sun or clicked on a cloud. Try again!',
            icon: 'error',
            confirmButtonText: 'Restart Game'
        }).then(() => {
            // Restart the game after the user clicks "Restart Game"
            location.reload();  // Reload the page to restart the game
        });
    }
}

// Start game function
function startGame() {
    if (gameStarted) return; // Prevent restarting if already started

    gameStarted = true;
    energy = 0;
    gameOver = false;
    panels = [];
    clouds = [];
    energyDisplay.textContent = energy;
    startBtn.style.display = "none";  // Hide the start button when the game starts

    // Game loop: randomly add solar panels and clouds
    const gameInterval = setInterval(() => {
        if (gameOver) {
            clearInterval(gameInterval);  // Stop generating panels and clouds if the game is over
            return;
        }

        const x = Math.random() * (boardWidth - panelWidth);
        const y = Math.random() * (boardHeight - panelHeight);
        createSolarPanel(x, y);

        if (Math.random() < 0.3) {  // 30% chance to spawn a cloud
            createClouds();
        }
    }, 1000);  // Add a panel or cloud every second
}

// Button click event (Start or Restart)
startBtn.addEventListener('click', () => {
    if (gameOver) {
        // Restart the game if it's over
        location.reload();
    } else {
        startGame();
    }
});
