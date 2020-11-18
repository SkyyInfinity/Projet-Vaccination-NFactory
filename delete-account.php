<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Supprimer mon compte';

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
                    <li><a href="mon-compte.php?id=<?php echo $_SESSION['user']['id'] ?>">Mes informations</a></li>
                    <li><a href="read-vaccins.php?id=<?php echo $_SESSION['user']['id'] ?>">Mes vaccins</a></li>
                    <li><a class="actived btn-contrast danger" href="delete-account.php?id=<?php echo $_SESSION['user']['id'] ?>">Supprimer mon compte</a></li>
                </ul>
            </nav>
            <!-- CONTENT -->
            <div class="listing-box">
                <p><span>Voulez vous vraiment supprimer votre compte ?</span></p>
                <ul>
                    <li><a class="danger-confirme" href="delete-account-true.php?id=<?php echo $_SESSION['user']['id'] ?>">Supprimer</a></li>
                    <li><a class="btn-contrast" href="mon-compte.php?id=<?php echo $_SESSION['user']['id'] ?>">Annuler</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');