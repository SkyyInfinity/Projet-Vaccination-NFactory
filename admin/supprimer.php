<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM contact WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $contactsupp = $query->fetch();

  if(!empty($contactsupp)) {
    // préparation de la requête
    $sql = "DELETE FROM contact WHERE id=:id";
    //liaison du paramètre nommé
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id , PDO::PARAM_INT);
    //execution de la requete
    $query->execute();
    redirect('admin_listing_users.php');

  } else {
    redirect('404.php');
  }
} else {
  redirect('404.php');
}

redirect('messagerie.php');