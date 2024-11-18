<?php 
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $UtilisateurId = $_REQUEST['btnAdmin'];
    $btnState = $_REQUEST['btnState'];
}


$stmt = $conn->prepare("update Utilisateurs set EstAdmin = ? where UtilisateurId = ?");
$stmt->bind_param('is',$btnState,$UtilisateurId);
$info = "Modification Enregistrée";
unset($btnState);
if (!$stmt->execute()) {
    $_SESSION['Err'] = "Échec exécution requête: " . $stmt->error;
} else {
    $_SESSION['Info'] = $info;
}

header('Location:../listeUtilisateurs.php');