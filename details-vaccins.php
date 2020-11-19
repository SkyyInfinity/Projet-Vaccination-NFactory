<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mes vaccins';

// RECUPERE L'ID
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM vaccins WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $vaccin = $query->fetch();
  
    if(empty($vaccin)) {
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
                    <li><a class="active btn-contrast" href="read-vaccins.php?id=<?php echo $_SESSION['user']['id'] ?>">Mes vaccins</a></li>
                    <li><a class="danger" href="delete-account.php?id=<?php echo $_SESSION['user']['id'] ?>">Supprimer mon compte</a></li>
                </ul>
            </nav>
            <div class="listing-box">
                <div class="details-vaccin">
                    <h3><span>Nom: </span><?php echo $vaccin['nom'] ?></h3>
                    <h3><span>Maladie Ciblée: </span><?php echo $vaccin['maladie_ciblées'] ?></h3>
                    <h3><span>Description: </span><?php echo $vaccin['details'] ?></h3>
                    <h3><span>Informations: </span><?php echo $vaccin['presentation'] ?></h3>
                </div>
                <div class="retour">
                    <a class="btn" href="add-vaccins.php?id=<?php echo $_SESSION['user']['id'] ?>">Retour</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');