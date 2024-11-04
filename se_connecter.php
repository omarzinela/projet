<?php include_once 'composant/header.php'; ?>

<form>

    <div class="form-group row  mt-3">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="mail" class="form-control" id="Prenom" placeholder="email@groupe-esigelec.org">

        </div>
    </div>
    <div class="form-group row  mt-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
        </div>
    </div>
    <button type="submit" class="btn btn-color mb-2">Créer un Compte</button>

</form>

<?php include_once 'composant/footer.php'; ?>