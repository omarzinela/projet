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
                    <img src="<?php echo $row['EntrainementThumbnail']; ?>" alt="Miniature de l'entraînement" class="card-img-top img-fluid" style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['EntrainementNom']; ?></h5>
                        <ul class="list-unstyled mb-0">
                            <?php if (isset($_SESSION['UtilisateurId'])): ?>
                                <li>Date: <?php echo date('Y/m/d', $row['EntrainementTimestamp']); ?></li>
                                <li>Heure: <?php echo date('H:i', $row['EntrainementTimestamp']); ?></li>
                                <li>Lieu: <?php echo $row['Lieu']; ?></li>
                            <?php endif; ?>
                            <li>Catégorie: <?php echo $row['Categorie']; ?></li>
                            <li>Description: <?php echo $row['Description']; ?></li>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['UtilisateurId'])): ?>
                        <div class="card-footer text-center">
                            <form action="bdd/inscriptionCourse.php" method="POST">
                                <?php if (in_array($row['EntrainementId'], array_column($inscriptions, 'EntrainementId'), true)): ?>
                                    <input type="hidden" name="btnState" value="delete">
                                    <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-danger mb-2">Se désinscrire</button>
                                <?php elseif (@$nbParti[$row['EntrainementId']] < $row['MaxParticipants']): ?>
                                    <input type="hidden" name="btnState" value="create">
                                    <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-success mb-2">S'inscrire</button>
                                <?php endif; ?>
                                <input type="hidden" name="source" value="../entrainements.php">
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if (@$_SESSION['EstAdmin']): ?>
                        <div>
                            <form action="listeUtilisateurs.php" method = "POST">
                                <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-color mb-2">Liste inscrits</button>
                            </form>
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