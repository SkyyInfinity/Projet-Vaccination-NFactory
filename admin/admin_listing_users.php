<?php
//session_start();
include('../inc/pdo.php');
include('../inc/functions.php');


 //  requete utilisateur //
$sql = "SELECT * FROM users";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();
//debug($users);
// pagination //




// requete modifier, supprimer //


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

    <?php foreach ($users as $user): ?>
      <form class="" action="index.html" method="post">
        <div class="users">
          <tr>
            <th>Nom utilisateur</th>
            <p>Nom: <?php echo $user['nom']; ?></p>
          </tr>
          <p>Nom: <?php echo $user['prenom']; ?></p>
          <p>Nom: <?php echo $user['email']; ?></p>
        </div>
      </form>
      <?php endforeach; ?>
    </div>
</body>
</html>
