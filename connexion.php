<?php
// Connexion
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Connexion';

$errors = array();

// if soumis
if (!empty($_POST['submitted'])) {
  // Faille
  $email = cleanXss($_POST['email']);
  $password = cleanXss($_POST['password']);

  if(!empty($email) && !empty($password)) {
    // request
    $sql = "SELECT * FROM users WHERE email = :email OR password = :password";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->bindValue(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if (!empty($user)) {
      if (password_verify($password, $user['password'])) {

        // connexion possible
        $_SESSION['user'] = array(
          'id' => $user['id'],
          'nom' => $user['nom'],
          'prenom' => $user['prenom'],
          'email' => $user['email'],
          'role' => $user['role'],
          'ip' => $_SERVER['REMOTE_ADDR']
        );

        header('Location: index.php');
      } else {
        $errors['password'] = 'Le mot de passe est incorrect.';
      }
    }else {
      $errors['password'] = 'Une erreur est survenue, veuillez réessayer.';
    }
  } else {
    $errors['password'] = 'Veuillez renseigner les champs.';
  }
}

include('inc/header.php');?>

<section class="connexion-content">
  <div class="wrap">

    <h2>Connexion</h2>
    <hr>

    <form id="formconnex" action="" method="post" novalidate>
      <!-- EMAIL -->
      <div class="box-form">
        <!-- <label for="mail">E-mail<span>*</span></label> -->
        <input placeholder="&#xf0e0 Adresse Email" type="email" name="email"  id="mail" value="<?php if (!empty($_POST['email'])){echo $_POST['email'];} ?>">
        <span class="error"><?php if (!empty($errors['email'])){echo $errors['email'];} ?></span>
      </div>
      <!-- MOT DE PASSE -->
      <div class="box-form">
        <!-- <label for="mdp">Mot de passe<span>*</span></label> -->
        <input placeholder="&#xf084 Mot de passe" type="password" name="password"  id="mdp" value="<?php if (!empty($_POST['password'])){echo $_POST['password'];} ?>">
        <span class="error"><?php if (!empty($errors['password'])){echo $errors['password'];} ?></span>
      </div>
      <!-- MDP OUBLIE -->
      <div class="btn-forgot">
        <a href="forgotPassword.php">Mot de passe oublié</a>
      </div>
      <!-- SUBMIT -->
      <input class="btn-contrast" type="submit" name="submitted" value="Se connecter">
    </form>

  </div>
</section>

<?php include('inc/footer.php');
