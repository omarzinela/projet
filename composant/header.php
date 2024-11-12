<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style31.css">
    <link rel="shortcut icon" href="../img/logo-reshaped.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <title>RUNNINESIGELEC</title>
</head>

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
                        <li class="nav-item">
                            <a class="nav-link active" href="historique.php">Historique des entraînements</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="a_propos.php">À propos de nous</a>
                        </li>
                       
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">


                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Se déconnecter</a>
                        </li>
                       
                    </ul>

                </div>
            </nav>
        </header>
        <main style="
    min-height: 600px;
">
<?php session_start()?>