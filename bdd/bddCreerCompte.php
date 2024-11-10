<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les valeurs du form
    $Nom = $_REQUEST['Nom'];
    $Prenom = $_REQUEST['Prenom'];
    $Numero = $_REQUEST['Numero'];
    $Email = $_REQUEST['Email'];
    $Password = password_hash($_REQUEST['Password'], PASSWORD_BCRYPT);
}

include_once '../composant/bddConn.inc.php';

$stmt = $conn->prepare("insert into Utilisateurs (Nom, Prenom, Mail, Tel, Pass) values (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss',$Nom, $Prenom, $Email, $Numero, $Password);
if (!$stmt->execute()) {
    echo "Echec exécution requête: " . $stmt->error;
}

// Closing the connection.
$conn->close();

header('Location: '."../index.php");