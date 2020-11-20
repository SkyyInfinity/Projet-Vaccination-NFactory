<?php
// Connexion
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mot de passe oublié';
$errors = array();

if (!empty($_POST['submitted'])) {
  // Faille
  $email = cleanXss($_POST['email']);
  // validation email(email valide, unique)
  if(!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql = "SELECT id, prenom FROM users WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query->bindValue(':email',$email,PDO::PARAM_STR);
      $query->execute();
      $verifEmail_count = $query->rowCount();

        if ($verifEmail_count == 1) {
          $_SESSION['email'];
          // echo $_SESSION['email'];

          $prenom = $query->fetch();
          $prenom = $prenom['prenom'];
          // $prenom= $prenom['prenom'] ;
        echo 'Bonjour '.$prenom ;?>
              <p>Cliquez<a href="reinit.php"> ici </a> Pour réinitialiser votre mot de passe</p>
            <?php

        } else {
          $errors['email'] = 'Cette addresse mail n\'est pas enregistrer dans notre site !';   }

    }
    else {
      $errors['email'] = 'Adresse mail invalide';}
  }
  else {
    $errors['email'] = 'Veuillez renseigner un email';
  }
}



include('inc/header.php');?>
<section class="connexion-content">
  <div class="wrap">
    <h2>Récuperation mot de passe</h2>
    <hr>
    <p>Indiquez l'adresse E-mail associée à votre Espace client pour générer un nouveau mot de passe</p>
    <form class="forgotConnex" action="" method="post">
    <!-- EMAIL -->
    <div class="box-form">
      <input type="text" name="email" placeholder="&#xf0e0 adresse E-mail" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];} ?>">
      <span class="error" style="color: red;"><?php if (!empty($errors['email'])) {echo $errors['email'];} ?></span>
    </div>
      <input class="btn-contrast" type="submit" name="submitted" value="Valider">
      <input class="btn-contrast" type="submit" name="resetted" value="Annuler">
      <?php if (!empty($_POST['resetted'])) {redirect('connexion.php');}
      ?>
    </form>
  </div>
</section>

<?php
include('inc/footer.php');?>
