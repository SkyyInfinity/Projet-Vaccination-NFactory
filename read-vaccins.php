<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mes vaccins';

// RECUPERE L'ID
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
// JOINTURE USER/VACCINS
$sql = "SELECT users.id, vaccins.nom, users_vaccins.date_vaccin
        FROM users 
        LEFT JOIN users_vaccins 
        ON users.id = users_vaccins.id_user 
        RIGHT JOIN vaccins 
        ON users_vaccins.id_vaccin = vaccins.id 
        WHERE users.id = $id";
$query = $pdo->prepare($sql);
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
                <p><span>Vaccins ajoutés</span></p>
                <?php
                 for ($i=0; $i<count($userVaccins) ; $i++) {
                    echo '<p>' . $userVaccins[$i]['nom'] . '</p><span class="date-vaccin">Date: ' . formatDateWithoutMinute($userVaccins[$i]['date_vaccin']) . '</span>';
                };
                ?>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');