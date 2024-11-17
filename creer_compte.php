<?php include_once 'composant/header.php'; ?>

<form action='bdd/bddCreerCompte.php' method='POST'>
    <div class="form-group row mt-3">
        <label for="Nom" class="col-12 col-sm-2 col-form-label">Nom :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Votre Nom">
        </div>
    </div>
    
    <div class="form-group row mt-3">
        <label for="Prenom" class="col-12 col-sm-2 col-form-label">Prénom :</label>
        <div class="col-12 col-sm-10">
            <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Votre Prénom">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="Email" class="col-12 col-sm-2 col-form-label">Email :</label>
        <div class="col-12 col-sm-10">
            <input type="email" class="form-control" id="Email" name="Email" placeholder="email@groupe-esigelec.org">
        </div>
    </div>
    
    <div class="form-group row mt-3">
        <label for="Password" class="col-12 col-sm-2 col-form-label">Mot de passe :</label>
        <div class="col-12 col-sm-10">
            <input type="password" class="form-control" id="Password" name="Mot de passe" placeholder="Mot de passe">
        </div>
    </div>

    <button type="submit" class="btn btn-color mb-2 w-100 w-md-auto">Créer un Compte</button>
</form>
<?php include_once 'composant/footer.php'; ?>