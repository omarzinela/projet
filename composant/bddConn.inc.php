<?php
require_once 'credentials.inc.php'; // Le fichier DOIT être dans le git ignore
// Create connection
$conn = new mysqli($host, $login, $password, $dbname);
$conn->set_charset("utf8mb4"); // Sinon les accents ne s'affichent pas correctement
// Check connection
if ($conn->connect_error) {
    die("Échec de connection bdd: " . $conn->connect_error);
}