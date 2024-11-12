<?php include_once 'composant/header.php'; ?>

<form>
    <div class="form-group row mt-3">
        <label for="nom_entraînement" class="col-sm-2 col-form-label">Nom de l'entraînement :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nom_entraînement" placeholder="Nom de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="date_entraînement" class="col-sm-2 col-form-label">Date l'entraînement :</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="date_entraînement" placeholder="Date de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="heure_entraînement" class="col-sm-2 col-form-label">Heure l'entraînement :</label>
        <div class="col-sm-10">
            <input type="time" class="form-control" id="heure_entraînement" placeholder="Heure de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="lieu" class="col-sm-2 col-form-label">Lieu de l'entraînement :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lieu" placeholder="Lieu de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="catégorie" class="col-sm-2 col-form-label">Catégorie de l'entraînement :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="catégorie" placeholder="Catégorie de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="description" class="col-sm-2 col-form-label">Description de l'entraînement :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" rows="3" placeholder="Description de l'entraînement" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="participants_min" class="col-sm-2 col-form-label">Nombre minimum de participants :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="particpants_min" placeholder="Nombre minimum de participants" min="1" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="participants_max" class="col-sm-2 col-form-label">Nombre maximum de participants :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="particpants_max" placeholder="Nombre maximum de participants" min="1" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="image" class="col-sm-2 col-form-label">Ajouter une image :</label>
        <div class="col-sm-10">
            <input type="file" class="form-control-file" id="image" accept="image/*">
        </div>
    </div>
    
    <button type="submit" class="btn btn-color mb-2">Ajouter un entraînement </button>

</form>

<?php include_once 'composant/footer.php'; ?>