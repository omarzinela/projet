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

<div class="button-container">
    <?php if (isset($_SESSION['UtilisateurId'])): ?>
        <form action="bdd/inscriptionCourse.php" method="POST" class="d-inline">
            <?php if (in_array($row['EntrainementId'], array_column($inscriptions, 'EntrainementId'), true)): ?>
                <input type="hidden" name="btnState" value="delete">
                <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-danger mb-2">
                    Se désinscrire
                </button>
            <?php elseif (@$nbParti[$row['EntrainementId']] < $row['MaxParticipants']): ?>
                <input type="hidden" name="btnState" value="create">
                <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-success mb-2">
                    S'inscrire
                </button>
            <?php endif; ?>
            <input type="hidden" name="source" value="../entrainements.php">
        </form>
    <?php endif; ?>
    
    <?php if (@$_SESSION['EstAdmin']): ?>
        <form action="listeUtilisateurs.php" method="POST" class="d-inline">
            <button type="submit" name="EntrainementId" value="<?php echo $row['EntrainementId']; ?>" class="btn btn-info mb-2">
                Liste inscrits
            </button>
        </form>
    <?php endif; ?>
</div>


                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php
$conn->close();
endif;
include_once 'composant/footer.php';