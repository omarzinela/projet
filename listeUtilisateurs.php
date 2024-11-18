<?php include_once 'composant/header.php';
include_once 'composant/notification.php';
if(!@$_SESSION['EstAdmin']):
    $_SESSION['Warn'] = "Vous N'êtes pas admin!";
    header('Location:index.php');
else:
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $EntrainementId = $_REQUEST['EntrainementId'];
    } else {
        $_SESSION['source'] = '../listeUtilisateurs.php';
    }
    require_once 'composant/listeUtilisateurs.inc.php';
    if (!$res) :
        $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
    elseif ($res->num_rows == 0) :
        $_SESSION["Info"] = '<p>Aucun utilisateur dans la bdd</p>';
        header('Location:'.substr($_SESSION['source'],3)); // Offset pour retirer le ../
    else :
    ?>

    <div class="container mt-4">
        <div class="row g-4">
        <?php while ($row = $res->fetch_assoc()) : ?>

            <div class="card-body">
            <?php echo $row['Nom']." ".$row['Prenom']; ?> :
                <ul class="list-unstyles mb-0">
                    <li> <?php echo $row['Mail']; ?> </li>
                </ul>
            </div>
        </li>
        <div class="card-footer text-center">
        <form action="bdd/bddListeUtilisateurs.php" method = "POST">
                <?php if ($row['EstAdmin']): ?>
                    <input type="hidden" name="btnState" value="0">
                    <button type="submit" name="btnAdmin" value="<?php echo $row['UtilisateurId']; ?>" class="btn btn-color mb-2">Rétrograder à utilisateur</button>
                <?php else: ?>
                    <input type="hidden" name="btnState" value="1">
                    <button type="submit" name="btnAdmin" value="<?php echo $row['UtilisateurId']; ?>" class="btn btn-color mb-2">Promouvoir à membre</button>
                <?php endif;?>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
endif;
$conn->close();
endif;
include_once 'composant/footer.php'; ?>