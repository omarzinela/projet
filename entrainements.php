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

<div class="container mt-4">
  <ul class="list-group list-group-flush border rounded">

  <li class="list-group-item">
  <h5 class="mb-1"><?php echo $row['EntrainementNom']; ?></h5>
  <ul class="list-unstyled">
  <?php if (isset($_SESSION['UtilisateurId'])): ?>
  <li><strong>Date:</strong> <?php echo date('Y/m/d', $row['EntrainementTimestamp']); ?></li>
  <li><strong>Heure:</strong> <?php echo date('H:i', $row['EntrainementTimestamp']); ?></li>
  <li><strong>Lieu:</strong> <?php echo $row['Lieu']; ?></li>
  <?php endif; ?>
  <li><strong>Catégorie:</strong> <?php echo $row['Categorie']; ?></li>
  <li><strong>Description:</strong> <?php echo $row['Description']; ?></li>
  </ul>
  </li>

  <?php if (isset($_SESSION['UtilisateurId'])): ?>
  <li class="list-group-item d-flex justify-content-between">
  <form action="bdd/inscriptionCourse.php" method="POST">
  <?php if (in_array($row['EntrainementId'], array_column($inscriptions, 'EntrainementId'), true)): ?>
  <input type="hidden" name="btnState" value="delete">
  <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" class="btn btn-danger">Se désinscrire</button>
  <?php elseif (@$nbParti[$row['EntrainementId']] < $row['MaxParticipants']): ?>
  <input type="hidden" name="btnState" value="create">
  <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId'] ?>" class="btn btn-primary">S'inscrire</button>
  <?php endif; ?>
  <input type="hidden" name="source" value="../entrainements.php">
  </form>
  </li>
  <?php endif; ?>

  <li class="list-group-item">
  <div class="text-center">
  <img src="<?php echo $row['EntrainementThumbnail'] ?>" alt="Miniature de l'entraînement" class="img-fluid rounded img_train">
  </div>
  </li>
  </ul>
</div>

<?php 
  endwhile; 
  $conn->close();
endif; 
include_once 'composant/footer.php';