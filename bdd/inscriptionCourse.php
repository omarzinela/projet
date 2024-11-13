<?php
session_start();
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EntrainementId = $_REQUEST['EntrainementId'];
}
$time = time();

$stmt = $conn->prepare("insert into Inscriptions (UtilisateurId, EntrainementId, InscriptionTimestamp) values (?, ?, ?)");
$stmt->bind_param('ssi',$_SESSION['UtilisateurId'], $EntrainementId, $time);

if (!$stmt->execute()) {
    $_SESSION['Msg'] = "Échec exécution requête: " . $stmt->error;
} else {
    $_SESSION['Msg'] = "Inscription réussie!";
}

// Closing the connection.
$conn->close();

header('Location: '."../entrainements.php");