<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style31.css">
    <link rel="shortcut icon" href="img/logo-reshaped.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <title>RUNNINESIGELEC</title>
</head>
<script>
document.querySelectorAll('.navbar-nav a').forEach(item => {
  item.addEventListener('click', () => {
  const navbarCollapse = document.getElementById('navbarSupportedContent');
  if (navbarCollapse.classList.contains('show')) {
  navbarCollapse.classList.remove('show');
  }
  });
});
</script>
<?php session_start(); ?>
<body>
    <div class="container-fluid">
        <header class="">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <a class="navbar-brand" href="index.php">
                    <!-- <img src="../img/Logo_bannière.png" alt=""> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="entrainements.php">Entraînements</a>
                        </li>

                        <!-- si membre ou admin de l'asso -->
                        <?php if(isset($_SESSION['UtilisateurId'])): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="historique.php">Historique des entraînements</a>
                        </li>
                        <?php endif; 
                        if(@$_SESSION['EstAdmin']): ?>
                        <!-- si admin de l'asso -->
                        <li class="nav-item">
                            <a class="nav-link active" href="ajouter_entrainement.php">Ajouter un entraînement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="listeUtilisateurs.php">Liste Utilisateurs</a>
                        </li>
                        <?php endif; ?>

                                         



                        <li class="nav-item">
                            <a class="nav-link" href="a_propos.php">À propos de nous</a>
                        </li>
                       
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                     <!-- si visiteur -->
                     <?php if(!isset($_SESSION['UtilisateurId'])) :?>
                        <li class="nav-item">
                            <a class="nav-link" href="se_connecter.php">Se connecter</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="creer_compte.php">Créer un compte</a>
                        </li> 
                        <!-- si admin ou membre -->
                        <?php else: ?>                  
                        <li class="nav-item">
                            <a class="nav-link" href="bdd/deconnexion.php">Se déconnecter</a>
                        </li>
                        <?php endif;?>
                       
                    </ul>

                </div>
            </nav>
        </header>
        <main class="class_footer">