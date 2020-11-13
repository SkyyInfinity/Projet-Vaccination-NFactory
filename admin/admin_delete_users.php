<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $user = $query->fetch();

  if(!empty($user)) {
    // préparation de la requête
    $sql = "DELETE FROM users WHERE id=:id";
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
