<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');

//Deconnexion
$_SESSION = array();
session_destroy();

//Suppression du compte
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();
  
    if(!empty($user)) {

      $sql = "DELETE FROM users WHERE id=:id";
      $query = $pdo->prepare($sql);
      $query->bindValue(':id', $id , PDO::PARAM_INT);
      $query->execute();
  
    } else {
      redirect('404.php');
    }
  } else {
    redirect('404.php');
  }

include('inc/header.php');

if(empty($_SESSION)) {
    ?>
<section class="inscription-content">
    <div class="wrap">
        <h2>Mon compte</h2>
        <hr>
        <div class="congrats-wrap">
            <h3 class="congrats-message">votre déconnexion à bien été pris en compte ! <br>
                                         Nous sommes navrés de vous voir partir :(</h3>
            <p class="congrats-redirect">Vous allez être automatiquement redirigé vers l'accueil...</p>
        </div>
    </div>
</section>
    <?php
    redirectTempo(5, 'index.php');
}

include('inc/footer.php');