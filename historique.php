<?php
include_once 'composant/header.php';
include_once 'composant/notification.php';
require_once 'bdd/bddHistorique.php';

if (!$res) :
    $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Info"] = '<p>Aucunes course dans la bdd</p>';
else :
    while ($row = $res->fetch_assoc()) :
?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
<<<<<<< HEAD
    <li class="list-group-item class_entrainement">Entraînement 7:
        <ul>
        <li>Date</li>
        <li>Heure</li>
        <li>Lieu</li>
        <li>Catégorie</li>
        <li>Description</li>
        </ul>
        <div class="bottom boutton_position">
            <button type="submit" class="btn btn-color mb-2">
                <a href="information.php" class="btn_lien"> Plus d'informations
                </a>
            </button>
=======
    <li class="list-group-item d-flex flex-column" style="width: 290px; height: 250px;">
        <div>
        <?php echo $row['EntrainementNom']; ?> :
        <ul class="mb-0">
            <li> <?php echo date('Y/m/d',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo date('H:i',$row['EntrainementTimestamp']); ?> </li>
            <li> <?php echo $row['Lieu']; ?> </li>
            <li> <?php echo $row['Categorie']; ?> </li>
            <li> <?php echo $row['Description']; ?> </li>
        </ul>
>>>>>>> eb20d48113036f9b85f24b85841e687f3ed0bdcc
        </div>
    </li>

    <div class="box mt-4 div_auto">
        <div class="div div_auto">
<<<<<<< HEAD
            <img src="img/depositphotos_54892607-stock-photo-male-runner-in-san-francisco.jpg" alt="" class="img_course">
=======
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" style="width: 300px;">
>>>>>>> eb20d48113036f9b85f24b85841e687f3ed0bdcc
        </div>
    </div>
</ul>

<?php endwhile;
endif;
include_once 'composant/footer.php';