<?php
session_start();
//session_start();
include('../inc/pdo.php');
include('../inc/functions.php');


 //  requete utilisateur //
$sql = "SELECT * FROM users ORDER BY nom ASC";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();
//debug($users);
// pagination //




// requete  supprimer //


?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="wrap">
      <h1>Tableau users | MODERATION</h1>
      <style>
        body{background-color: #d3d3d3;}
        h1{text-align: center;}
        .users{
          text-align: center;
          border:1px solid black;
  	      padding: 10px;
  	      margin-top: 15px;}
          .wrap {
  	       max-width: 1000px;
  	      width:100%;
  	      margin: 0 auto;}
         </style>
      <table>


        <?php foreach ($users as $user): ?>
          <form class="" action="index.html" method="post">
            <div class="users">

              <p>Nom: <?php echo $user['nom']; ?></p>
              <p>Prenom: <?php echo $user['prenom']; ?></p>
              <p>email: <?php echo $user['email']; ?></p>

              <a href="admin_delete_users.php?id=<?= $user['id'] ?>">Supprimer</a>

            </div>
          </form>
        <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
