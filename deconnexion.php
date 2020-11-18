<?php
session_start();
$_SESSION = array();
session_destroy();
include('inc/functions.php');
$title = 'Déconnexion';

include('inc/header.php');
if(empty($_SESSION)) {
    ?>
<section class="inscription-content">
    <div class="wrap">
        <h2>Déconnexion</h2>
        <hr>
        <div class="congrats-wrap">
            <h3 class="congrats-message">votre déconnexion à bien été pris en compte !</h3>
            <p class="congrats-redirect">Vous allez être automatiquement redirigé vers l'accueil...</p>
        </div>
    </div>
</section>
    <?php
    redirectTempo(5, 'index.php');
}
include('inc/footer.php');