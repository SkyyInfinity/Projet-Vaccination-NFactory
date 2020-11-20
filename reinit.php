<?php
// Connexion
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Réinitialiser mot de passe';
$errors = array();

if (!empty($_POST['submitted'])) {
  // Faille
  $password1 = cleanXss($_POST['password1']);
  $password2 = cleanXss($_POST['password2']);


  // validtion password
  if (!empty($password1) OR !empty($password2)) {
    if ($password1 === $password2) {
      $majuscule        = preg_match('@[A-Z]@', $password1);
      $minuscule        = preg_match('@[a-z]@', $password1);
      $chiffre          = preg_match('@[0-9]@', $password1);
      $caractereSpecial = preg_match('@[^\w]@', $password1);
        if(mb_strlen($password1) < 5) {
          $errors['password'] = 'Le mot de passe doit être plus grand que 5 caractères.';
        } elseif(mb_strlen($password1) > 45) {
          $errors['password'] = 'Le mot de passe doit être plus petit que 45 caractères.';
        }
         elseif(!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial) {
          $errors['password'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
        }
    }else {
      $errors['password'] = 'Veillez renseigner des mots de passes identiques';
    }


  }
  else {
   $errors['password'] = 'Veuillez renseigner ce champ.';
 }

 if(count($errors) == 0)
 {
   // $email = cleanXss($_GET['email']);
   $_SESSION['email'];
   echo $_SESSION['email'];
   // debug($_SESSION);
   $hashPassword= password_hash($password1, PASSWORD_DEFAULT);

   $role = 'abonne';

   $token = generateRandomString(120);

   $sql = "UPDATE users SET  password = :password, updated_at = NOW() WHERE email= :email ";
       $query = $pdo->prepare($sql);
       $query->bindValue(':email',$_SESSION['email'],PDO::PARAM_STR);
       $query->bindValue(':password',$hashPassword,PDO::PARAM_INT);
       $query->execute();



   die('Votre mot de passe à bien été réinitialiser');


 } else {
   redirect('404.php');
 }



}
include('inc/header.php');
?>
<style>
  .reinit{margin-top: 8px;}
  .reinitialisation-box {padding-top: 8px; }
</style>
<section class="connexion-content">
  <div class="wrap">
    <h2 class="reinit">Réinitialisation mot de passe</h2>
    <hr>
    <div class="reinitialisation-box">
      <form class="reinitform" action="" method="post">
        <div class="form3">
          <input placeholder="&#xf0e0 Mot de passe" type="password" name="password1"  id="mdp" value="<?php if (!empty($_POST['password1'])){echo $_POST['password1'];} ?>">
          <span class="error"><?php if (!empty($errors['password'])){echo $errors['password'];} ?></span>
        </div>

        <div class="form3">
          <input placeholder="&#xf0e0 Confirmation du mot de passe" type="password" name="password2"  id="mdp2" value="<?php if (!empty($_POST['password2'])){echo $_POST['password2'];} ?>">
          <span class="error"><?php if (!empty($errors['password'])){echo $errors['password'];} ?></span>
        </div>
        <div>
          <input class="btn-contrast" type="submit" name="submitted" value="Changer le mot de Passe">
          <input class="btn-contrast" type="submit" name="annuler" value="Annuler">
          <?php if (!empty($_POST['annuler'])) {redirect('forgotPassword.php');}
          ?>

        </div>
      </form>
    </div>
  </div>
</section>









<?=
include('inc/footer.php');




 ?>
