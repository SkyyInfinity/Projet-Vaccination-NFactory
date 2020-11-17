<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mes vaccins';

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

// SELECT * FROM A INNER JOIN B ON A.key = B.key
$sql = "SELECT * FROM `users-vaccins` WHERE id_user = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$userVaccins = $query->fetchAll();

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
                <?php 
                foreach ($userVaccins as $userVaccin) {
                    echo $userVaccin['id_user'];
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');