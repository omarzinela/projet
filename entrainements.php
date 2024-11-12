<?php
include_once 'composant/header.php';
require_once 'composant/bddConn.inc.php';
include_once 'composant/notification.php';

$resIns = $conn->query("select IdEntrainnement from Inscriptions where IdUtilisateur =" . $_SESSION['UtilisateurId']); // Risque d'injection mais si l'utilisateur manipule son cookie il peut devenir admin plus facilement
if (!$res) {
    echo '<p>Échec requête: ' . $conn->error . '</p>';
} else {
    $inscriptions = $resIns->fetch_all();
}

$res = $conn->query("select * from Entrainements");
if (!$res) :
    echo '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    echo '<p>Aucunes course dans la bdd</p>';
else :
    while ($row = $res->fetch_assoc()) :
?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item" style="width: 290px; height: 250px;"> <?php echo $row['EntrainementNom'] ?> :
        <ul>
            <li> <?php echo date('Y/m/d',$row['EntrainementTimestamp']) ?> </li>
            <li> <?php echo date('H:i',$row['EntrainementTimestamp']) ?> </li>
            <li> <?php echo $row['Categorie'] ?> </li>
            <li> <?php echo $row['Description'] ?> </li>
        </ul>
    <div class="bottom" style="position: absolute;bottom: 0;">
        <form action="bdd/inscriptionCourse.php" method = "POST">
            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" <?php if (in_array($row['EntrainementId'],$inscriptions,true)){ ?> disabled <?php   } ?> class="btn btn-color mb-2">S'inscrire</button>
        </form>
    </div>
    </li>
    <div class="box mt-4" style="margin-left: auto;">
        <div class="div" style="margin-left: auto;">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" style="width: 300px;">
        </div>
    </div>
</ul>

<?php endwhile;
endif;
include_once 'composant/footer.php';