<?php
include_once 'composant/header.php';
include_once 'composant/notification.php';
require_once 'bdd/bddHistorique.php';

if (!isset($_SESSION['UtilisateurId'])) {
    $_SESSION['Info'] = "Vous n'êtes pas connectés";
    header('Location: index.php');
}
if (!$res) :
    $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Info"] = '<p>Aucunes course dans la bdd</p>';
else :
    while ($row = $res->fetch_assoc()) :
?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item d-flex flex-column class_entrainement">
        <div>
        <?php echo $row['EntrainementNom']; ?> :
        <ul class="mb-0">
            <li> <?php echo date('Y/m/d',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo date('H:i',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo $row['Lieu']; ?> </li>
            <li> <?php echo $row['Categorie']; ?> </li>
            <li> <?php echo $row['Description']; ?> </li>
        </ul>
        </div>
    </li>

    <div class="box mt-4 div_auto">
        <div class="div div_auto">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img_course">
        </div>
    </div>
</ul>

<?php endwhile;
endif;
include_once 'composant/footer.php';