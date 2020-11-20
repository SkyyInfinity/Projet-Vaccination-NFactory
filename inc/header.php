<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>MyVaccine.org | <?php echo $title; ?></title>
    </head>
    <body>

        <!-- HEADER -->
        <header id="header">
            <div class="border-gradient"></div>
            <div class="wrap">
                <nav class="navigation">
                    <div class="logo">
                        <a href="index.php"><img class="logo_green" src="assets/img/myvaccine_x200.png" alt="Logo MyVaccine"></a>
                    </div>
                    <ul id="nav-links" class="nav-links">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php if(!empty($_SESSION['user'])) { ?>
                            <?php if(!empty($_SESSION['user']['role'] == 'abonne')) { ?>
                                <li><a class="inscription" href="mon-compte.php?id=<?php echo $_SESSION['user']['id'] ?>">Mon compte</a></li>
                            <?php } ?> 
                            <?php if(!empty($_SESSION['user']['role'] == 'admin')) { ?>
                                <li><a class="inscription" href="admin/index.php">Admin</a></li>
                            <?php } ?> 
                            <li><a class="connexion" href="deconnexion.php">Déconnexion</a></li>
                        <?php } else { ?>
                            <li><a class="connexion" href="connexion.php">Connexion</a></li>
                            <li><a class="inscription" href="inscription.php">Inscription</a></li>
                        <?php }; ?>
                    </ul>
                    <?php if(!empty($_SESSION['user'])) { ?>
                        <li><p class="welcome">Bonjour <span><?php echo $_SESSION['user']['prenom']; ?></span></p></li> 
                    <?php } ?>
                    <div id="hamburger" class="hamburger">
                        <div class="line"><i id="modifier_class" class="fas fa-bars"></i></div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- CONTENT -->
        <div id="content">