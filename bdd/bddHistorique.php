<?php 
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

if(isset($_SESSION['UtilisateurId'])) {
    $stmt = $conn->prepare("select Entrainements.EntrainementId, EntrainementNom, EntrainementTimestamp, Categorie, Lieu, Description, MaxParticipants, EntrainementThumbnail from Entrainements join Inscriptions on Entrainements.EntrainementId = Inscriptions.EntrainementId where UtilisateurId = ? and EntrainementTimestamp < unix_timestamp()");
    $stmt->bind_param('s', $_SESSION['UtilisateurId']);
    if (!$stmt->execute()) {
        $_SESSION["Err"] = "Échec exécution requête: " . $stmt->error;
    } else {
        $res = $stmt->get_result();
    }
}