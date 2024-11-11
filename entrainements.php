<?php include_once 'composant/header.php'; ?>

<?php include_once 'composant/bddConn.inc.php';

$res = $conn->query("select * from Entrainements");
if (!$res) {
    echo 'Échec requête: ' . $conn->error;
} elseif ($res->num_rows == 0) {
    echo '<p>Aucunes courses dans la bdd</p>';
} else {
    while ($row = $res->fetch_assoc()) {

        echo '<ul class="list-group list-group-flush flex-row border rounded mt-2">
            <li class="list-group-item" style="width: 290px; height: 250px;">' . $row['EntrainementNom'] . ':
                <ul>
                    <li>' . date('Y/m/d',$row['EntrainementTimestamp']) . '</li>
                    <li>' . date('H:i',$row['EntrainementTimestamp']) .'</li>
                    <li>' . $row['Categorie']. '</li>
                    <li>' . $row['Description'] . '</li>
                </ul>
                <div class="bottom" style="position: absolute;bottom: 0;">
                    <button type="submit" class="btn btn-color mb-2">S\'inscrire</button>
                    <button type="submit" class="btn btn-color mb-2">
                        <a href="information.php" style="color: white; text-decoration:none;"> Plus d\'informations</a>
                    </button>
                </div>

            </li>
            <div class="box mt-4" style="margin-left: auto;">
                <div class="div" style="margin-left: auto;">
                    <img src="' . $row['EntrainementThumbnail'] . '" alt="" style="width: 300px;">
                </div>
            </div>
        </ul>';
    }
}
?>

<?php include_once 'composant/footer.php';