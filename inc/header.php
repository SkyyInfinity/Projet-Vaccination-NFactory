<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>MyVaccine.org | <?php echo $title; ?></title>
    </head>
    <body>

        <!-- HEADER -->
        <header id="header">
            <div class="border-gradient"></div>
            <div class="wrap">
                <nav>
                    <div class="logo">
                        <a href="index.php"><img class="logo_green" src="assets/img/myvaccine_x200.png" alt="Logo MyVaccine"></a>
                    </div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php if(!empty($_SESSION['user'])) { ?>
                            <li><a class="connexion" href="deconnexion.php">Déconnexion</a></li>
                            <li><p class="welcome">Bonjour <span><?php echo $_SESSION['user']['prenom']; ?></span></p></li>
                        <?php } else { ?>
                            <li><a class="connexion" href="connexion.php">Connexion</a></li>
                            <li><a class="inscription" href="inscription.php">Inscription</a></li>
                            <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- CONTENT -->
        <div id="content">