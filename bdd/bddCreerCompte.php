<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les valeurs du form
    $Nom = $_REQUEST['Nom'];
    $Prenom = $_REQUEST['Prenom'];
    $Email = $_REQUEST['Email'];
    $Password = password_hash($_REQUEST['Password'], PASSWORD_BCRYPT);
}

require_once '../composant/bddConn.inc.php';

$stmt = $conn->prepare("insert into Utilisateurs (Nom, Prenom, Mail, Pass) values (?, ?, ?, ?)");
$stmt->bind_param('ssss',$Nom, $Prenom, $Email, $Password);
if (!$stmt->execute()) {
    $_SESSION["Msg"] = "Échec exécution requête: " . $stmt->error;
} else {
    $_SESSION["Msg"] = "Création de compte réussie!";
}

// Closing the connection.
$conn->close();
header('Location: '."../index.php");