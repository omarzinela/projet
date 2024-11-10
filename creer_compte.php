<?php include_once 'composant/header.php'; ?>

<form action=bdd/bddCreerCompte.php  method= POST/GET>
    <div class="form-group row mt-3">
        <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Nom" placeholder="Votre Nom">
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="Prenom" class="col-sm-2 col-form-label">Prenom :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Prenom" placeholder="Votre Prenom">
        </div>
    </div>
    <div class="form-group row  mt-3">
        <label for="Numero" class="col-sm-2 col-form-label">Numero :</label>
        <div class="col-sm-10">
            <input type="tel" class="form-control" id="Numero" placeholder="Votre Numero">
        </div>
    </div>

    <div class="form-group row  mt-3">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="mail" class="form-control" id="Prenom" placeholder="email@groupe-esigelec.org">

        </div>
    </div>
    <div class="form-group row  mt-3">
        <label for="Password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="Password" placeholder="Password">
        </div>
    </div>
    <button type="submit" class="btn btn-color mb-2">Créer un Compte</button>

</form>

<?php include_once 'composant/footer.php'; ?>