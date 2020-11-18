<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mes informations';

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();

    if(empty($user)) {
        redirect('404.php');
    }
}

include('inc/header.php');

?>
<section class="moncompte-section">
    <div class="wrap">
        <h2>Mon compte</h2>
        <hr>
        <div class="moncompte-box">
            <nav class="moncompte-nav">
                <ul>
                    <li><a class="active btn-contrast" href="mon-compte.php?id=<?php echo $_SESSION['user']['id'] ?>">Mes informations</a></li>
                    <li><a href="read-vaccins.php?id=<?php echo $_SESSION['user']['id'] ?>">Mes vaccins</a></li>
                    <li><a class="danger" href="delete-account.php?id=<?php echo $_SESSION['user']['id'] ?>">Supprimer mon compte</a></li>
                </ul>
            </nav>
            <!-- CONTENT -->
            <div class="listing-box">
                <p><span>Nom</span><?php echo $user['nom'] ?></p>
                <p><span>Prenom</span><?php echo $user['prenom'] ?></p>
                <p><span>Adresse email</span><?php echo $user['email'] ?></p>
                <p><span>Mot de passe</span><a class="modify-mdp" href="forgotPassword.php">Modifier mon mot de passe</a></p>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');