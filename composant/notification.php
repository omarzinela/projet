<?php if (isset($_SESSION['Msg'])): ?>
<div class="alert alert-success" role="alert">
  Ceci est une alerte de succès.
</div>

<div class="alert alert-danger" role="alert">
  Ceci est une alerte de danger.
</div>

<div class="alert alert-warning" role="alert">
  Ceci est une alerte de mise en garde.
</div>

<div class="alert alert-info" role="alert">
  Ceci est une alerte d'information.
</div>

<?php echo $_SESSION['Msg']; // todo: faire une notification jolie avec bootstrap en insérant cette ligne (moins le commentaire) dans le html ?>
<?php endif;?>