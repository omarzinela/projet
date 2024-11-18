<?php 
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UtilisateurId = $_REQUEST['btnAdmin'];
    $btnState = $_REQUEST['btnState'];
    $source = $_REQUEST['source'];
}

if(isset($btnState)){
    $stmt = $conn->prepare("update Utilisateurs set EstAdmin = ? where UtilisateurId = ?");
    $stmt->bind_param('is',$btnState,$UtilisateurId);
    $info = "Modification Enregistrée";
    unset($btnState);
    if (!$stmt->execute()) {
        $_SESSION['Err'] = "Échec exécution requête: " . $stmt->error;
    } else {
        $_SESSION['Info'] = $info;
    }
}

$res = $conn->query("select * from Utilisateurs where UtilisateurId != '". $_SESSION['UtilisateurId'] . "' order by Nom");
// Si l'utilisateur peut manipuler son cookie pour injecter du sql il peut juste set EstAdmin=true donc pas de risque réel ici

if (isset($source)){
    header('Location:'.$source);
    unset($source);
}