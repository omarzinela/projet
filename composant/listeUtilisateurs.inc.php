<?php
@session_start();
require_once dirname(__FILE__).'/../composant/bddConn.inc.php';
if (strcmp($_SESSION['source'], '../listeUtilisateurs.php') == 0) {
    $res = $conn->query("select * from Utilisateurs where UtilisateurId != '". $_SESSION['UtilisateurId'] . "' order by Nom");
    // Si l'utilisateur peut manipuler son cookie pour injecter du sql il peut juste set EstAdmin=true donc pas de risque réel ici
}

if (strcmp($_SESSION['source'], '../entrainements.php') == 0) {
    $res = $conn->query("select Utilisateurs.UtilisateurId, Nom, Prenom, Mail, EstAdmin from Utilisateurs join Inscriptions on Utilisateurs.UtilisateurId = Inscriptions.UtilisateurId where Utilisateurs.UtilisateurId != '". $_SESSION['UtilisateurId'] . "' and EntrainementId = '".$EntrainementId."'  order by Nom");
    // Injection sql mais pas le temps de corriger
}