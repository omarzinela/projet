<?php
session_start();
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les valeurs du form
    $Email = $_REQUEST['Email'];
    $Password = $_REQUEST['Password'];
} else {
    header('Location:../index.php'); // Rediriger vers page principale si l'utilisateur n'arrive pas du form
}

if (!($stmt = $conn->prepare("select UtilisateurId, Pass, EstAdmin from Utilisateurs where Mail = ?"))) {
    $_SESSION['Err'] = "Echec de la préparation : (" . $conn->errno . ") " . $conn->error;
}
$stmt->bind_param('s', $Email);

if (!$stmt->execute()) {
    $_SESSION['Err'] = "Échec exécution requête: " . $stmt->error;
    $redirUrl = "../se_connecter.php";

} else {
    $stmt->store_result();
    if ($stmt->num_rows() == 0) {
        $_SESSION['Warn'] = 'Informations de connexion invalides!';
        $redirUrl = "../se_connecter.php";
    }
    else {
        $stmt->bind_result($UtilisateurId, $PasswordHash, $EstAdmin);
        $stmt->fetch();
        if (password_verify($Password,$PasswordHash)) {
            $_SESSION['UtilisateurId'] = $UtilisateurId;
            $_SESSION['EstAdmin'] = $EstAdmin; // Il faut utiliser database session sinon manipulation de cookie triviale
            $_SESSION['Msg'] = 'Connexion réussie!';
            $redirUrl = "../index.php";

        } else {
            $_SESSION['Warn'] = 'Informations de connexion invalides!';
            $redirUrl = "../se_connecter.php";
        }
    }
}
unset($Password);
$conn->close();
header('Location:'. $redirUrl);