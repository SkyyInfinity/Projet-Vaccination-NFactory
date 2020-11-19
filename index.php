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
        <h2>En quoi consiste le site ?</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quaerat eaque hic facere vitae amet, et magnam, dicta quasi ea labore! Iure ipsam sunt nulla quia quo fugit velit voluptatibus blanditiis, facilis et est tenetur nam doloremque omnis sapiente excepturi? Voluptate, rem accusamus necessitatibus vitae saepe voluptatem eos veniam tempora aliquam dolorem suscipit at sed, dolores autem quasi et? Dolorum beatae facilis debitis molestias asperiores recusandae sed culpa incidunt voluptatem? Quidem asperiores rem repellendus commodi eligendi minima similique fuga! Voluptas tempore laudantium assumenda, modi dolores expedita laborum pariatur hic commodi? Corporis consectetur numquam autem eveniet ducimus modi quidem tenetur cupiditate?</p>
    </div>
</section>
<?php

include('inc/footer.php');
