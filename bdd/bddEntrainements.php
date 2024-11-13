<?php 
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if(isset($_SESSION['UtilisateurId'])) {
    $stmt = $conn->prepare("select EntrainementId from Inscriptions where UtilisateurId = ?");
    $stmt->bind_param('s', $_SESSION['UtilisateurId']);
    if (!$stmt->execute()) {
        $_SESSION["Msg"] = "Échec exécution requête: " . $stmt->error;
    } else {
        $resIns = $stmt->get_result();
        $inscriptions = $resIns->fetch_all(MYSQLI_ASSOC);
    }
} else {
    $inscriptions = array();
}

$res = $conn->query("select * from Entrainements");