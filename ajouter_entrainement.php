<?php include_once 'composant/header.php'; ?>
<?php if(!@$_SESSION['EstAdmin']):
    $_SESSION['Warn'] = "Vous N'êtes pas admin!";
    header('Location:index.php');
else:?>
<form action="bdd/bddAjouterEntrainement.php" method="POST" enctype="multipart/form-data">
    <div class="form-group row mt-3">
        <label for="nom_entraînement" class="col-12 col-sm-2 col-form-label">Nom de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="nom_entraînement" name="nom" placeholder="Nom de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="date_entraînement" class="col-12 col-sm-2 col-form-label">Date de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="date" class="form-control" id="date_entraînement" name="date" placeholder="Date de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="heure_entraînement" class="col-12 col-sm-2 col-form-label">Heure de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="time" class="form-control" id="heure_entraînement" name="heure" placeholder="Heure de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="lieu" class="col-12 col-sm-2 col-form-label">Lieu de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="catégorie" class="col-12 col-sm-2 col-form-label">Catégorie de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="catégorie" name="catégorie" placeholder="Catégorie de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="description" class="col-12 col-sm-2 col-form-label">Description de l'entraînement :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="description" name="description" rows="3" placeholder="Description de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="participants_max" class="col-12 col-sm-2 col-form-label">Nombre maximum de participants :</label>
        <div class="col-12 col-sm-10">
            <input type="number" class="form-control" id="participants_max" name="participants_max" placeholder="Nombre maximum de participants" min="1" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="image" class="col-12 col-sm-2 col-form-label">Ajouter une image :</label>
        <div class="col-12 col-sm-10">
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
    </div>
    
    <button type="submit" class="btn btn-color mb-2 w-100 w-md-auto">Ajouter un entraînement</button>
</form>
<?php endif;
include_once 'composant/footer.php'; ?>
