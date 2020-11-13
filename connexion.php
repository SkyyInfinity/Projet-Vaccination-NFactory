<?php
// Connexion
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$errors = array();

// if soumit
if (!empty($_POST['submitconnex'])) {
  // Faille
  $mail = cleanXss($_POST['mail']);
  $password = cleanXss($_POST['password']);

  if(!empty($mail) && !empty($password)) {
    // request
    
  }
}






include('inc/header.php');?>
<h1>Connexion</h1>

<form id="formconnex" action="" method="post">
  <label for="mail">E-mail *</label>
  <input type="text" name="mail" value="<?php if (!empty($_POST['mail'])) {
    echo $_POST['mail'];
  } ?>">
  <span class="error"><?php if (!empty($errors['mail'])) {
    echo $errors['mail'];
  } ?></span>

  <label for="mail">Mot de passe *</label>
  <input type="text" name="mail" value="<?php if (!empty($_POST['password'])) {
    echo $_POST['password'];
  } ?>">
  <span class="error"><?php if (!empty($errors['password'])) {
    echo $errors['password'];
  } ?></span>


  <input type="submit" name="submitconnex" value="Je me connecte">
</form>

<?php include('inc/footer.php');
