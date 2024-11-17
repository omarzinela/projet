
<?php include_once 'composant/header.php';
include_once 'composant/notification.php'; ?>

<form action="bdd/bddConnexion.php" method="POST">
    <div class="form-group row mt-3">
        <label for="Email" class="col-12 col-sm-2 col-form-label">Email</label>
        <div class="col-12 col-sm-10">
            <input type="email" class="form-control" id="Email" name="Email" placeholder="email@groupe-esigelec.org" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="Password" class="col-12 col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-12 col-sm-10">
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Mot de passe" required>
        </div>
    </div>

    <button type="submit" class="btn btn-color mb-2 w-100 w-md-auto">Connexion</button>
</form>

<?php include_once 'composant/footer.php'; ?>