<?php include_once 'composant/header.php'; ?>

<div class="row">
  <img src="img/banniere_accueil.png" alt="bannière">
</div>

<?php include_once 'composant/notification.php'; ?>

<ul class="list-group list-group-flush flex-row rounded mt-2">
  <p class="texte_a_propos">
    Bienvenue sur le site officiel de notre association de running d'ESIGELEC ! Que vous soyez coureur débutant ou athlète chevronné, notre
    communauté est l'endroit idéal pour partager votre passion, vous dépasser et tisser des liens avec d'autres passionnés de la course à
    pied. Nous organisons régulièrement des sessions d'entraînement adaptées à tous les niveaux ainsi que des événements spéciaux pour
    célébrer notre amour commun du sport et du bien-être. Rejoignez-nous pour découvrir des parcours variés, relever de nouveaux défis, et
    faire partie d'une équipe dynamique et motivée. N'attendez plus, venez courir avec nous et faites partie de l'aventure !
  </p>


  <div class="box mt-4 div_auto">
    <div class="div div_auto">
      <img class="img_position_300px" src="img\runners.jpg" alt="runner image">
    </div>
  </div>
</ul>
<br>
<?php
require_once 'bdd/bddEntrainements.php';

if (!$res) :
    $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Info"] = '<p>Aucunes course dans la bdd</p>';
else :
?>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
  <?php while ($row = $res->fetch_assoc()) : ?>
    <div class="carousel-item <?php if(!isset($firstelm)) echo 'active'; $firstelm = ''; ?>">
      <ul class="list-group list-group-flush flex-row border rounded mt-2">
        <li class="list-group-item d-flex flex-column class_entrainement">
          <div>
            <?php echo $row['EntrainementNom']; ?> :
            <ul class="mb-0">
            <?php if (isset($_SESSION['UtilisateurId'])): ?>
              <li> <?php echo date('Y/m/d', $row['EntrainementTimestamp']); ?> </li>
              <li> <?php echo date('H:i', $row['EntrainementTimestamp']); ?> </li>
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
        <input type="hidden" name="source" value="../index.php">
        </form>
    </div>
    <?php endif;?>

    <div class="box mt-4 div_auto">
        <div class="div div_auto">
            <img src=" <?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img_course">
        </div>
    </div>
</ul>
</div>
<?php endwhile;
endif;?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<?php include_once 'composant/footer.php'; ?>
