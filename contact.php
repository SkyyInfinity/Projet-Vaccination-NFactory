<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Contact';

$errors = array();
$success = false;

// traitement php
if (!empty($_POST['submitted'])) {

  // Failles Xss 
  $nom = cleanXss($_POST['nom']);
  $email = cleanXss($_POST['email']);
  $msg = cleanXss($_POST['msg']);


  // validationText pour champs nom et message 
  $errors = validationText($errors, $nom, 'nom', 4, 50);
  $errors = validationText($errors, $msg, 'msg', 5, 2000);

  // validation email(email valide)
  $errors = validationEmail($errors, $email, 'email');

  if (count($errors) == 0) {



    // Envoi du formulaire sur la base de donnée contact
    $sql = "INSERT INTO contact (nom, email, message, created_at) 
            VALUES  (:nom, :email, :msg, NOW())";
    $query = $pdo->prepare($sql);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':msg', $msg, PDO::PARAM_STR);
    $query->execute();

    $success = true;
  }
}

// debug($errors);
// debug($_POST);
include('inc/header.php'); ?>

<section class="inscription-content">
  <div class="wrap">
    <h2>Nous contacter</h2>
    <hr>
    <?php if ($success == true) { ?>
      <section class="inscription-content">
        <div class="wrap">
          <div class="congrats-wrap">
            <h3 class="congrats-message">Votre message a bien été pris en compte !</h3>
            <p class="congrats-redirect">Vous allez être automatiquement redirigé vers l'accueil...</p>
          </div>
        </div>
      </section>
      <?php
      redirectTempo(5, 'index.php');
      ?>

    <?php } else { ?>
      <form id="forminscrit" action="" method="post" novalidate>

        <!-- NOM -->
        <div class="box-form">
          <!-- <label for="name">Nom<span>*</span></label> -->
          <input placeholder="&#xf406 Nom" type="text" name="nom" id="name" value="<?php if (!empty($_POST['nom'])) {
                                                                                      echo $_POST['nom'];
                                                                                    } ?>">
          <span class="error"><?php if (!empty($errors['nom'])) {
                                echo $errors['nom'];
                              } ?></span>
        </div>

        <!-- EMAIL -->
        <div class="box-form">
          <!-- <label for="mail">E-mail<span>*</span></label> -->
          <input placeholder="&#xf0e0 Adresse Email" type="email" name="email" id="mail" value="<?php if (!empty($_POST['email'])) {
                                                                                                  echo $_POST['email'];
                                                                                                } ?>">
          <span class="error"><?php if (!empty($errors['email'])) {
                                echo $errors['email'];
                              } ?></span>
        </div>

        <!-- MESSAGE  -->
        <div class="box-form">
          <!-- <label for="name">message<span>*</span></label> -->
          <textarea placeholder="&#xf305 Votre message" name="msg" id="msg" value="<?php if (!empty($_POST['msg'])) {
                                                                                      echo $_POST['msg'];
                                                                                    } ?>"></textarea>
          <span class="error"><?php if (!empty($errors['msg'])) {
                                echo $errors['msg'];
                              } ?></span>
        </div>

        <!-- BOUTON ENVOYER -->
        <input class="btn-contrast" type="submit" name="submitted" value="Envoyer">
      </form>

    <?php } ?>
  </div>
</section>

<?php
include('inc/footer.php');
