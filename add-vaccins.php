<?php
session_start();
include('inc/pdo.php');
include('inc/functions.php');
$title = 'Mes vaccins';

$errors = array();

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
// SELECT VACCINS
$sql = "SELECT * FROM vaccins ORDER BY nom ASC";
$query = $pdo->prepare($sql);
$query->execute();
$vaccins = $query->fetchAll();

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

if (!empty($_POST['submitted'])) {
    if ($_POST['vaccin'] == on)
    {$capt1 = 1;}
    else
    {$capt1 = 0;}

    if(!empty($idVaccin)) {
      // request
      $sql = "INSERT INTO users_vaccins(id_user, id_vaccin, date_vaccin) VALUES (:id_user,:id_vaccin, NOW())";
      $query = $pdo->prepare($sql);
      $query->bindValue(':id_user',$id,PDO::PARAM_INT);
      $query->bindValue(':id_vaccin',$capt1,PDO::PARAM_INT);
      $query->execute();

      $userID = $_SESSION['user']['id'];

      redirect("read-vaccins.php?id=$userID");
    } else {
      $errors['password'] = 'Veuillez renseigner au moins un vaccin.';
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
                <div class="listing-vaccins">
                    <form action="" method="post">
                        <?php foreach($vaccins as $vaccin) { ?>
                            <div class="checkbox">
                                <input type="checkbox" id="vaccin" name="vaccin">
                                <label for="vaccin"><?php echo $vaccin['nom']; ?><a href="details-vaccins.php?id=<?php echo $vaccin['id']; ?>">Voir</a></label>
                            </div>
                        <?php } ?>
                        <div class="submit">
                            <input class="btn-contrast" name="submitted" type="submit" value="Ajouter"><a class="btn" href="read-vaccins.php?id=<?php echo $_SESSION['user']['id'] ?>">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

include('inc/footer.php');