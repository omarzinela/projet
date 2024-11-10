<?php
require_once '../composant/credentials.inc.php'; // Le fichier DOIS être dans le git ignore
// Create connection
$conn = new mysqli($host, $login, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Échec de connection bdd: " . $conn->connect_error);
}