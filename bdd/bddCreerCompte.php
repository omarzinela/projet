<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les valeurs du form
    $Nom = $_REQUEST['Nom'];
    $Prenom = $_REQUEST['Prenom'];
    $Email = $_REQUEST['Email'];
    $domain = explode('@',$Email)[1];
    $Password = password_hash($_REQUEST['Password'], PASSWORD_BCRYPT);
} else {
    header('Location:../index.php'); // Rediriger vers page principale si l'utilisateur n'arrive pas du form
}

if (strcmp($domain, 'groupe-esigelec.org') != 0) { // Authoriser uniquement les adresses esigelec
    $_SESSION['Warn'] = 'Uniquement les emails @groupe-esigelec.org sont authorisés!';
    header('Location:../creer_compte.php');
} else {

    require_once dirname(__FILE__).'/../composant/bddConn.inc.php';

    $stmt = $conn->prepare("insert into Utilisateurs (Nom, Prenom, Mail, Pass) values (?, ?, ?, ?)");
    $stmt->bind_param('ssss',$Nom, $Prenom, $Email, $Password);
    try {
        $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        if($stmt->errno == 1062) {
            $_SESSION["Err"] = "Email déjà utilisé";
        } else {
            $_SESSION["Err"] = "Échec exécution requête: " . $stmt->error;
        }
        $redir = '../creer_compte.php';
    }
    if(!isset($_SESSION["Err"])) {
        $_SESSION["Msg"] = "Création de compte réussie!";
        $redir = '../index.php';
    }

    // Closing the connection.
    $conn->close();
    header('Location:'.$redir);
}