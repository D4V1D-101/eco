<?php
$servername = "localhost";
$username = "energyfelhaszn";
$password = "energyadmin123--";
$dbname = "energyfelhaszn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
