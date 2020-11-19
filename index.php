<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
//debug($_SESSION);
$title = 'Accueil';

include('inc/header.php');

?>
<div class="hero">
    <img src="assets/img/accueil_hero_opacity.jpg" alt="Docteur qui montre des vaccins">
    <div class="info">
        <h1 class="info-title">Besoin d'une gestion de vos vaccins ou d'un rappel pour ne pas oublier ?</h1>
        <?php if(!empty($_SESSION['user'])) { ?>
            <a href="my-account.php" class="btn info-btn">Commencer maintenant</a>
        <?php } else { ?>
        <a href="inscription.php" class="btn info-btn">S'inscrire maintenant</a>
        <?php } ?>
    </div>
</div>
<section class="section-explications">
    <div class="wrap">
        <h2>En quoi consiste le service proposé par notre Site ?</h2>
        <hr>
        <p>Sur notre Site, les utilisateurs peuvent créer et consulter leur carnet de vaccination personnel.</br>

Le service offert par notre Site a pour objet de faire de la gestion de votre activité médicale une simple formalité,</br>
en effet, vous pourrez y tenir une liste complète de vos différents vaccins et ainsi reçevoir des mails personalisé pour le rappel de ceux ci.</br>

MyVaccine.org est un service totalement gratuit au service de ses utilisateurs.</p>
    </div>
</section>
<?php

include('inc/footer.php');
