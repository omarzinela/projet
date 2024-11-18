<?php include_once 'composant/header.php';
include_once 'composant/notification.php';
if(!@$_SESSION['EstAdmin']):
    $_SESSION['Warn'] = "Vous N'êtes pas admin!";
    header('Location:index.php');
else:
    require_once('bdd/bddListeUtilisateurs.php');
    if (!$res) :
        $_SESSION["Err"] = '<p>Échec requête: ' . $conn->error . '</p>';
    elseif ($res->num_rows == 0) :
        $_SESSION["Info"] = '<p>Aucun utilisateur dans la bdd</p>';
    else :
        while ($row = $res->fetch_assoc()) : // Créer les éléments de la liste dans une boucle depuis la bdd
    ?>

    <ul class="list-group list-group-flush flex-row border rounded mt-2">
        <li class="list-group-item class_utilisateur">
            <div>
                <?php echo $row['Nom']." ".$row['Prenom']; ?> :
                <ul class="mb-0">
                    <li> <?php echo $row['Mail']; ?> </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="mt-auto">
                <form action="bdd/bddListeUtilisateurs.php" method = "POST">
                <?php if ($row['EstAdmin']): ?>
                    <input type="hidden" name="btnState" value="0">
                    <button type="submit" name="btnAdmin" value="<?php echo $row['UtilisateurId']; ?>" class="btn btn-color mb-2">Rétrograder à utilisateur</button>
                <?php else: ?>
                    <input type="hidden" name="btnState" value="1">
                    <button type="submit" name="btnAdmin" value="<?php echo $row['UtilisateurId']; ?>" class="btn btn-color mb-2">Promouvoir à membre</button>
                <?php endif;?>
                    <input type="hidden" name="source" value="../listeUtilisateurs.php">
                </form>
            </div>
        </li>
    </ul>

    <?php endwhile;
    $conn->close();
    endif;
endif;
include_once 'composant/footer.php'; ?>