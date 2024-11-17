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

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <?php 
    $firstelm = true; // Initial setting to ensure the first item gets the 'active' class
    while ($row = $res->fetch_assoc()) : ?>
      <div class="carousel-item <?php if(!isset($firstelm)) echo 'active'; unset($firstelm); ?>">

        <ul class="list-group list-group-flush flex-row border rounded mt-2">
          <li class="list-group-item d-flex flex-column class_entrainement">
            <div>
              <?php echo htmlspecialchars($row['EntrainementNom']); ?> :
              <ul class="mb-0">
                <?php if (isset($_SESSION['UtilisateurId'])): ?>
                  <li><?php echo date('Y/m/d', $row['EntrainementTimestamp']); ?></li>
                  <li><?php echo date('H:i', $row['EntrainementTimestamp']); ?></li>
                  <li><?php echo htmlspecialchars($row['Lieu']); ?></li>
                <?php endif; ?>
                <li><?php echo htmlspecialchars($row['Categorie']); ?></li>
                <li><?php echo htmlspecialchars($row['Description']); ?></li>
              </ul>
              <div class="bottom boutton_position">
                <button type="submit" class="btn btn-color mb-2">S'inscrire</button>
                <button type="submit" class="btn btn-color mb-2">
                  <a href="information.php" class="btn_lien">Plus d'informations</a>
                </button>
              </div>
            </div>
          </li>
          <div class="box mt-4 div_auto">
            <div class="div div_auto">
              <img src="img/depositphotos_54892607-stock-photo-male-runner-in-san-francisco.jpg" alt="runner image" class="img_course">
            </div>
          </div>
        </ul>
      </div>
    <?php endwhile; ?>
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
