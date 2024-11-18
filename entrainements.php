<?php
include_once 'composant/header.php';
include_once 'composant/notification.php';
require_once 'bdd/bddEntrainements.php';

if (!$res) :
    $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
elseif ($res->num_rows == 0) :
    $_SESSION["Info"] = '<p>Aucune course dans la bdd</p>';
else :
    $_SESSION['source'] = '../entrainements.php';
?>

<div class="container mt-4">
    <div class="row g-4">
        <?php while ($row = $res->fetch_assoc()) : ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border rounded">
                    <!-- Image avec hauteur ajustée -->
                    <img src="<?php echo $row['EntrainementThumbnail']; ?>" alt="Miniature de l'entraînement" class="card-img-top img-fluid entrainement-img">

                    <div class="card-body p-2">
                        <h6 class="card-title mb-1"><?php echo $row['EntrainementNom']; ?></h6>
                        <ul class="list-unstyled mb-1">
                            <?php if (isset($_SESSION['UtilisateurId'])): ?>
                                <li class="small">Date: <?php echo date('Y/m/d', $row['EntrainementTimestamp']); ?></li>
                                <li class="small">Heure: <?php echo date('H:i', $row['EntrainementTimestamp']); ?></li>
                                <li class="small">Lieu: <?php echo $row['Lieu']; ?></li>
                            <?php endif; ?>
                            <li class="small">Catégorie: <?php echo $row['Categorie']; ?></li>
                            <li class="small">Description: <?php echo $row['Description']; ?></li>
                        </ul>
                    </div>
                    
                    <?php if(isset($_SESSION['UtilisateurId'])): ?>
                        <div class="card-footer text-center">
                        <form action="bdd/inscriptionCourse.php" method="POST" class="d-inline-block">
                        <?php if (in_array($row['EntrainementId'], array_column($inscriptions, 'EntrainementId'), true)): ?>
                            <input type="hidden" name="btnState" value="delete">
                            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-danger mb-2 btn-inscrire">Se désinscrire</button>
                        <?php elseif (@$nbParti[$row['EntrainementId']] < $row['MaxParticipants']): ?>
                            <input type="hidden" name="btnState" value="create">
                            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-success mb-2 btn-inscrire"> S'inscrire</button>
                            <?php endif; ?>
                        </form>
                        <?php if (@$_SESSION['EstAdmin']): ?>
                            <form action="listeUtilisateurs.php" method="POST" class="d-inline-block">
                                <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-color mb-2">Liste inscrits</button>
                            </form>
                        <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php
$conn->close();
endif;
include_once 'composant/footer.php';