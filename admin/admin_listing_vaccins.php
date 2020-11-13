<?php
//session_start();
include('../inc/pdo.php');
include('../inc/functions.php');



$sql = "SELECT * FROM vaccins";
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
      <h1>Tableau des vaccins | MODERATION</h1>
      <style>
        body{background-color: #d3d3d3;}
        h1{text-align: center;}
        .vaccins{
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
          <div class="vaccins">
            <p>Nom: <?php echo $user['nom']; ?><button type="submit" name="idToDelete" value="1">Modifier</button><button type="submit" name="idToDelete" value="1">Supprimer</button></p>
            <p>Indications thérapeutiques: <?php echo $user['maladie_ciblées']; ?><button type="submit" name="idToDelete" value="1">Modifier</button><button type="submit" name="idToDelete" value="1">Supprimer</button></p>
            <button type="submit" name="idToDelete" >More details</button>
          </div>
        </form>
      <?php endforeach; ?>
</body>
</html>
