<?php include_once 'composant/header.php'; ?>

<ul class="list-group list-group-flush flex-row border rounded mt-2">
    <li class="list-group-item class_entrainement">Entrainment 1:
        <ul>
            <li>Date</li>
            <li>Categorie</li>
            <li>Lieu</li>
            <li>Description</li>
        </ul>
        <div class="bottom abs_bottom">
            <button type="submit" class="btn btn-color mb-2">s'inscrire</button>
            <button type="submit" class="btn btn-color mb-2">
                <a href="entrainement.php" class="btn_lien">Retour</a>
            </button>
        </div>

    </li>
    <li> <div class="box mt-4 div_auto">
        <div class="div div_auto">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img_course">
        </div>
    </div></li>

</ul>


<?php include_once 'composant/footer.php';?>