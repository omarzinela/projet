<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_REQUEST['nom'];
    $timestamp = strtotime($_REQUEST['date'] . $_REQUEST['heure']);
    $description = $_REQUEST['description'];
    $lieu = $_REQUEST['lieu'];
    $categorie = $_REQUEST['catégorie'];
    $maxPart = $_REQUEST['participants_max'];
} else {
    header('Location: ../index.php'); // Rediriger vers page principale si l'utilisateur n'arrive pas du form
}

$dossierCible = dirname(__FILE__)."/../uploads/";
$fichierCible = $dossierCible . $timestamp . '_' . basename($_FILES["image"]["name"]);
$fichierCibleBdd = 'uploads/' . $timestamp . '_' . basename($_FILES["image"]["name"]);

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $fichierCible)) {
    $_SESSION['Err'] = "Enregistrement de l'image impossible!";
} else {

    require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

    $stmt = $conn->prepare('insert into Entrainements (EntrainementNom, EntrainementTimestamp, Categorie, Description, MaxParticipants, EntrainementThumbnail, Lieu) values (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sississ', $nom, $timestamp, $categorie, $description, $maxPart, $fichierCibleBdd, $lieu);
    if (!$stmt->execute()) {
        $_SESSION["Err"] = "Échec exécution requête: " . $stmt->error;
    } else {
        $_SESSION["Msg"] = "Création d'entraînement' réussie!";
    }
    // Closing the connection.
    $conn->close();
}

header('Location: '."../index.php");