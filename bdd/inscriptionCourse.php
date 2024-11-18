<?php
session_start();
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EntrainementId = $_REQUEST['EntrainementId'];
    $btnState = $_REQUEST['btnState'];
} else {
    header('Location:../index.php'); // Rediriger vers page principale si l'utilisateur n'arrive pas du form
}
$time = time();

if(strcmp($btnState, "create") == 0){
    $stmt = $conn->prepare("insert into Inscriptions (UtilisateurId, EntrainementId, InscriptionTimestamp) values (?, ?, ?)");
    $stmt->bind_param('ssi',$_SESSION['UtilisateurId'], $EntrainementId, $time);
    $msg = "Inscription réussie!";
} else {
    $stmt = $conn->prepare("delete from Inscriptions where EntrainementID = ? and UtilisateurId = ?");
    $stmt->bind_param('ss', $EntrainementId, $_SESSION["UtilisateurId"]);
    $msg = "Désinscription réussie!";
}

if (!$stmt->execute()) {
    $_SESSION['Err'] = "Échec exécution requête: " . $stmt->error;
} else {
    $_SESSION['Msg'] = $msg;
}

// Closing the connection.
$conn->close();

header('Location:'.$_SESSION['source']);