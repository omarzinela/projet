<?php include_once 'composant/header.php'; ?>

<?php include_once 'bdd/bddEntrainements.php';?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item" style="width: 290px; height: 250px;">Entraînement 1:
        <ul>
        <li><?= $row['Date'] ?></li>
        <li><?= $row['Heure'] ?></li>
        <li><?= $row['Lieu'] ?></li>
        <li><?= $row['Categorie'] ?></li>
        <li><?= $row['Description'] ?></li>
        </ul>
        <div class="bottom" style="position: absolute;bottom: 0;">
            <button type="submit" class="btn btn-color mb-2">S'inscrire</button>
            <button type="submit" class="btn btn-color mb-2">
                <a href="information.php" style="color: white; text-decoration:none;"> Plus d'informations
                </a>
            </button>
        </div>

    </li>
    <div class="box mt-4" style="margin-left: auto;">
        <div class="div" style="margin-left: auto;">
            <img src="img/depositphotos_54892607-stock-photo-male-runner-in-san-francisco.jpg" alt="" style="width: 300px;">
        </div>
    </div>
</ul>

<?php}?>

<?php include_once 'composant/footer.php'; ?>