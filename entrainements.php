<?php
include_once 'composant/header.php';
include_once 'composant/notification.php';
require_once 'bdd/bddEntrainements.php';

if (!$res) :
    $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Info"] = '<p>Aucune course dans la bdd</p>';
else :
    while ($row = $res->fetch_assoc()) :
?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item class_entrainement">
        <div>
        <?php echo $row['EntrainementNom']; ?> :
        <ul class="mb-0">
        <?php if (isset($_SESSION['UtilisateurId'])): ?>
            <li> <?php echo date('Y/m/d',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo date('H:i',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo $row['Lieu']; ?> </li>
        <?php endif;?>
            <li> <?php echo $row['Categorie']; ?> </li>
            <li> <?php echo $row['Description']; ?> </li>
        </ul>
        </div>
    </li>
    <?php if (isset($_SESSION['UtilisateurId'])): ?>
    <div class="mt-auto">
        <form action="bdd/inscriptionCourse.php" method = "POST">
        <?php if (in_array($row['EntrainementId'],array_column($inscriptions,'EntrainementId'),true)): ?>
            <input type="hidden" name="btnState" value="delete">
            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" class="btn btn-color mb-2">Se désinscrire</button>
        <?php elseif (@$nbParti[$row['EntrainementId']] < $row['MaxParticipants']): ?>
            <input type="hidden" name="btnState" value="create">
            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" class="btn btn-color mb-2">S'inscrire</button>
        <?php endif;?>
        <input type="hidden" name="source" value="../entrainements.php">
        </form>
    </div>
    <?php endif;?>

    <div class="box mt-4 div_auto">
        <div class="div div_auto">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img_course">
        </div>
    </div>
</ul>

<?php endwhile;
$conn->close();
endif;
include_once 'composant/footer.php';