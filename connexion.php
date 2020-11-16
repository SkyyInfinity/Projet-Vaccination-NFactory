<?php
// Connexion
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$errors = array();

// if soumis
if (!empty($_POST['submitconnex'])) {
  // Faille
  $mail = cleanXss($_POST['mail']);
  $password = cleanXss($_POST['password']);

  if(!empty($mail) && !empty($password)) {
    // request
    $sql = "SELECT * FROM users WHERE email = :mail OR password = :password";
    $query = $pdo->prepare($sql);
    $query->bindValue(':mail',$mail,PDO::PARAM_STR);
    $query->bindValue(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    // debug($user);
    // die('ok');


    if (!empty($user)) {
      if (password_verify($password, $user['password'])) {
        // connexion possible

        $_SESSION['user'] = array(
          'id' => $user['id'],
          'mail' => $user['email'],
          'nom' => $user['nom'],
          'role' => $user['role'],
          'ip' => $_SERVER['REMOTE_ADDR']
        );
        // die('salut toi');

        header('Location: index.php');
      } else {
        $errors['password'] = 'Mot de passe incorrect';
      }
    }else {
      $errors['mail'] = 'Error credentials';
    }
  } else {
    $errors['mail'] = 'Veuillez renseigner les champs';

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
  <input type="password" name="password" value="<?php if (!empty($_POST['password'])) {
    echo $_POST['password'];
  } ?>">
  <span class="error"><?php if (!empty($errors['password'])) {
    echo $errors['password'];
  } ?></span>


  <input type="submit" name="submitconnex" value="Je me connecte">
</form>
<a href="verifCle.php">Mot de passe Oublié</a>


<?php include('inc/footer.php');
