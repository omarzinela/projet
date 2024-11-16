<?php if (isset($_SESSION['Msg'])): ?>
<div class="alert alert-success" role="alert">
  <?php echo $_SESSION['Msg'];
  unset($_SESSION['Msg']); ?>
</div>
<?php endif;?>

<?php if (isset($_SESSION['Err'])): ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION['Err'];
  unset($_SESSION['Err']); ?>
</div>
<?php endif;?>

<?php if (isset($_SESSION['Warn'])): ?>
<div class="alert alert-warning" role="alert">
<?php echo $_SESSION['Warn'];
  unset($_SESSION['Warn']); ?>
</div>
<?php endif;?>

<?php if (isset($_SESSION['Info'])): ?>
<div class="alert alert-info" role="alert">
<?php echo $_SESSION['Info'];
  unset($_SESSION['Info']); ?>
</div>
<?php endif;