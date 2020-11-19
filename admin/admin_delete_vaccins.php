<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');


if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM vaccins WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $vaccin = $query->fetch();

  if(!empty($vaccin)) {
    // préparation de la requête
    $sql = "DELETE FROM vaccins WHERE id=:id";
    //liaison du paramètre nommé
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id , PDO::PARAM_INT);
    //execution de la requete
    $query->execute();
    redirect('admin_listing_vaccins.php');

  } else {
    redirect('404.php');
  }
} else {
  redirect('404.php');
}
