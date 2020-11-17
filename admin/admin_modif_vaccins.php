<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');
$errors = array();

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM vaccins WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $vaccin = $query->fetch();


  if(!empty($vaccin)) {
    if(!empty($_POST['submitted'])) {
      // Faille xss
      $maladie = trim(strip_tags($_POST['maladie']));
      $detail  = trim(strip_tags($_POST['detail']));
      $description  = trim(strip_tags($_POST['description']));
      // validation texte
      $errors = validationText($errors,$maladie,'maladie',3,80);
      $errors = validationText($errors,$detail,'detail',10,2000);
      $errors = validationText($errors,$description,'description',3,2000);
      // si no error
      if(count($errors) == 0) {
        // insert INTO  => vaccins
        $sql = "UPDATE vaccins SET maladie_ciblées = :maladie, details = :detail, presentation = :description, modified_at = NOW() WHERE id = :id";
        $query = $pdo->prepare($sql);
        //$query->bindValue(':title',$title,PDO::PARAM_STR);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->bindValue(':maladie',$maladie,PDO::PARAM_STR);
        $query->bindValue(':detail',$detail,PDO::PARAM_STR);
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->execute();
        // redirection
        //header('Location: single.php?id='.$id);
        die('ok');
      }
    }
  }
  }
// Traitement du formualire


?>
<style>
body{background-color: #d3d3d3;}
.formulaire1{
  text-align: center;
  border:1px solid black;
   padding: 10px;
    margin-top: 15px;}
.wrap {
  max-width: 1000px;
  width:100%;
  margin: 0 auto;}
</style>
<div class="wrap">


<form class="formulaire1" action="" method="post">
  <!-- Maladie ciblées -->
  <div class="maladie">
    <label for="maladie">Maladie(s)</label>
    <textarea id="maladie" name="maladie" row="" cols="60"><?php if(!empty($_POST['maladie'])){echo $_POST['maladie'];} ?></textarea>
    <span class="error"><?php if(!empty($errors['maladie'])){echo $errors['maladie'];} ?></span>
  </div>
  <!-- Details -->
  <div class="detail">
    <label for="detail">Details</label>
    <textarea id="detail" name="detail" row="" cols="57"><?php if(!empty($_POST['detail'])){echo $_POST['detail'];} ?></textarea>
    <span class="error"><?php if(!empty($errors['detail'])){echo $errors['detail'];} ?></span>
  </div>
  <!-- Description -->
  <div class="description">
    <label for="description">Description</label>
    <textarea id="description" name="description" row="" cols="61"><?php if(!empty($_POST['description'])){echo $_POST['description'];} ?></textarea>
    <span class="error"><?php if(!empty($errors['description'])){echo $errors['description'];} ?></span>
  </div>
  <!-- SUBMIT -->
  <div class="form_submit">
    <input type="submit" name="submitted" value="Modifier">
    <a href="admin_listing_vaccins.php">Retour</a>
  </div>
</form>
</div>
