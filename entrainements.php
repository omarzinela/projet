<?php
include_once 'composant/header.php';
include_once 'composant/notification.php';
require_once 'bdd/bddEntrainements.php';

if (!$res) :
    $_SESSION["Msg"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Msg"] = '<p>Aucunes course dans la bdd</p>';
else :
    while ($row = $res->fetch_assoc()) :
?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item class_entrainement"> <?php echo $row['EntrainementNom']; ?> :
        <ul>
            <li> <?php if (isset($_SESSION['UtilisateurId'])) echo date('Y/m/d',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php if (isset($_SESSION['UtilisateurId'])) echo date('H:i',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo $row['Categorie']; ?> </li>
            <li> <?php echo $row['Description']; ?> </li>
        </ul>
    <div class="bottom boutton_position">
        <form action="bdd/inscriptionCourse.php" method = "POST">
            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" <?php if (in_array($row['EntrainementId'],array_column($inscriptions,'EntrainementId'),true)){ ?> disabled <?php   } ?> class="btn btn-color mb-2">S'inscrire</button>
            <!-- todo: remplacer par un switch inscription/désinscription -->
        </form>
    </div>
    </li>
    <div class="box mt-4 div_auto">
        <div class="div div_auto">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img_position_300px">
        </div>
    </div>
</ul>

<?php endwhile;
endif;
include_once 'composant/footer.php';