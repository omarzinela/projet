<?php
session_start();
unset($_SESSION['UtilisateurId']);
unset($_SESSION['EstAdmin']);
$_SESSION['Msg'] = 'Déconnexion réussie!';
header('Location: '."../index.php");