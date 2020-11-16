<?php
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Inscription';

$errors = array();
$success = false;

// traitement php
if (!empty($_POST['submitted'])) {
  // Faille
  $nom = cleanXss($_POST['nom']);
  $prenom = cleanXss($_POST['prenom']);
  $email = cleanXss($_POST['email']);
  $password1 = cleanXss($_POST['password1']);
  $password2 = cleanXss($_POST['password2']);

  // validationText
  $errors = validationText($errors,$nom,'nom',4,50);
  $errors = validationText($errors,$prenom,'prenom',3,50);

  // validation email(email valide, unique)
  if(!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] =  'Veuillez renseigner un email valide';
    }
    else {
      $sql = "SELECT id FROM users WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query->bindValue(':email',$email,PDO::PARAM_STR);
      $query->execute();
      $verifEmail = $query->fetch();
      if(!empty($verifEmail)) {
        $errors['email'] = 'Cet email existe déjà';
      }
    }
  }
  else {
    $errors['email'] = 'Veuillez renseigner un email';
  }

  // validtion password
  if (!empty($password1) && !empty($password2)) {
    if ($password1 != $password2) {
      $errors['password'] = 'Veillez renseigner des mots de passes identiques';
    }
  }
      $majuscule        = preg_match('@[A-Z]@', $password1);
      $minuscule        = preg_match('@[a-z]@', $password1);
      $chiffre          = preg_match('@[0-9]@', $password1);
      $caractereSpecial = preg_match('@[^\w]@', $password1);
      if(!empty($password1)){
        if(mb_strlen($password1) < 5) {
          $errors['password'] = 'Le mot de passe doit être plus grand que 5 caractères.';
        } elseif(mb_strlen($password1) > 45) {
          $errors['password'] = 'Le mot de passe doit être plus petit que 45 caractères.';
        }
         elseif(!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial) {
          $errors['password'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
        }
      }

       else {
        $errors['password'] = 'Veuillez renseigner ce champ.';
      }

      $majuscule        = preg_match('@[A-Z]@', $password2);
      $minuscule        = preg_match('@[a-z]@', $password2);
      $chiffre          = preg_match('@[0-9]@', $password2);
      $caractereSpecial = preg_match('@[^\w]@', $password2);
      if(!empty($password2)){
        if(mb_strlen($password2) < 5) {
          $errors['password'] = 'Le mot de passe doit être plus grand que 5 caractères.';
        } elseif(mb_strlen($password2) > 45) {
          $errors['password'] = 'Le mot de passe doit être plus petit que 45 caractères.';
        }
        elseif(!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial) {
          $errors['password'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
        }

      }else {
        $errors['password'] = 'Veuillez renseigner ce champ.';
      }

  if(count($errors) == 0) {

    $hashPassword= password_hash($password1, PASSWORD_DEFAULT);
    $role = 'abonne';
    $token = generateRandomString(120);

    // INSERT
    $sql = "INSERT INTO users (nom, prenom, email, password, created_at, token, role) VALUES  (:nom, :prenom, :email, :password, NOW(), '$token', '$role')";
    $query = $pdo -> prepare($sql);
    $query ->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query ->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query ->bindValue(':email', $email, PDO::PARAM_STR);
    $query ->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $query->execute();

    $success = true;
    // header('Location: index.php');


  }
}
// debug($errors);
// debug($_POST);
include('inc/header.php');?>

<section class="inscription-content">
  <div class="wrap">
    <h2>Inscription</h2>
    <hr>

  <?php if ($success == true) { ?>
    
    <div class="congrats-wrap">
      <h3 class="congrats-message"><span>Bravo</span>votre inscription à bien été pris en compte !</h3>
      <a class="btn-contrast congrats-btn" href="connexion.php">Se connecter</a>
    </div>

  <?php } else { ?>
    <form id="forminscrit" action="" method="post" novalidate>
      <!-- NOM -->
      <div class="box-form">
        <!-- <label for="name">Nom<span>*</span></label> -->
        <input placeholder="&#xf406 Nom" type="text" name="nom"  id="name" value="<?php if (!empty($_POST['nom'])){echo $_POST['nom'];} ?>">
        <span class="error"><?php if (!empty($errors['nom'])){echo $errors['nom'];} ?></span>
      </div>
      <!-- PRENOM -->
      <div class="box-form">
        <!-- <label for="prenom">Prénom<span>*</span></label> -->
        <input placeholder="&#xf406 Prénom" type="text" name="prenom"  id="prenom" value="<?php if (!empty($_POST['prenom'])){echo $_POST['prenom'];} ?>">
        <span class="error"><?php if (!empty($errors['prenom'])){echo $errors['prenom'];} ?></span>
      </div>
      <!-- EMAIL -->
      <div class="box-form">
        <!-- <label for="mail">E-mail<span>*</span></label> -->
        <input placeholder="&#xf0e0 Adresse Email" type="email" name="email"  id="mail" value="<?php if (!empty($_POST['email'])){echo $_POST['email'];} ?>">
        <span class="error"><?php if (!empty($errors['email'])){echo $errors['email'];} ?></span>
      </div>
      <!-- MOT DE PASSE 1 -->
      <div class="box-form">
        <!-- <label for="mdp">Mot de passe<span>*</span></label> -->
        <input placeholder="&#xf084 Mot de passe" type="password" name="password1"  id="mdp" value="<?php if (!empty($_POST['password1'])){echo $_POST['password1'];} ?>">
        <span class="error"><?php if (!empty($errors['password'])){echo $errors['password'];} ?></span>
      </div>
      <!-- MOT DE PASSE 2 -->
      <div class="box-form">
        <!-- <label for="mdp2">Confirmation Mot de passe<span>*</span></label> -->
        <input placeholder="&#xf084 Confirmation du mot de passe" type="password" name="password2"  id="mdp2" value="<?php if (!empty($_POST['password2'])){echo $_POST['password2'];} ?>">
        <span class="error"><?php if (!empty($errors['password'])){echo $errors['password'];} ?></span>
      </div>
      <!-- SUBMIT -->
      <input class="btn-contrast" type="submit" name="submitted" value="S'inscrire">
    </form>

  <?php } ?>
  </div>
</section>

<?php
include('inc/footer.php');
