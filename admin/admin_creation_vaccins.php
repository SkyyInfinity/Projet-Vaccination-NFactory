<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');
$errors = array();

    if(!empty($_POST['submitted'])) {
      // Faille xss
      $nom_vaccin = trim(strip_tags($_POST['nom_vaccin']));
      $maladie = trim(strip_tags($_POST['maladie']));
      $detail  = trim(strip_tags($_POST['detail']));
      $description  = trim(strip_tags($_POST['description']));
      // validation texte
      $errors = validationText($errors,$nom_vaccin,'nom_vaccin',3,200);
      $errors = validationText($errors,$maladie,'maladie',3,80);
      $errors = validationText($errors,$detail,'detail',10,2000);
      $errors = validationText($errors,$description,'description',3,2000);
      // si no error
      if(count($errors) == 0) {
        // insert INTO  => vaccins
        $sql = "INSERT INTO vaccins ( nom , maladie_ciblées , details , presentation , created_at )
                VALUES ( :nom , :maladie , :detail , :description , NOW() )";
        $query = $pdo->prepare($sql);
        //$query->bindValue(':title',$title,PDO::PARAM_STR);
        $query->bindValue(':nom',$nom_vaccin,PDO::PARAM_STR);
        $query->bindValue(':maladie',$maladie,PDO::PARAM_STR);
        $query->bindValue(':detail',$detail,PDO::PARAM_STR);
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->execute();
        // redirection
        redirect('admin_listing_vaccins.php');

      }
    }


// Traitement du formualire

include('inc/admin_header.php');
?>
<h1>Creation du vaccin</h1>
<style>
body{background-color: #d3d3d3;}
h1{
  text-align: center;
}
#nom_vaccin{
  height: 40px;
  width: 300px;
}
#maladie{
  height: 40px;
  width: 300px;
}
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
  <!-- nom -->
  <div class="nom_vaccin">
    <label for="nom_vaccin">nom_vaccin</label>
    <input id="nom_vaccin" type="text" name="nom_vaccin" value="<?php if(!empty($_POST['maladie'])){echo $_POST['maladie'];} ?>">
    <span class="error"><?php if(!empty($errors['nom_vaccin'])){echo $errors['nom_vaccin'];} ?></span>
  </div>
  <!-- Maladie ciblées -->
  <div class="maladie">
    <label for="maladie">Maladie(s)</label>
    <input id="maladie" type="text" name="maladie" value="<?php if(!empty($_POST['maladie'])){echo $_POST['maladie'];} ?>">
    <span class="error"><?php if(!empty($errors['maladie'])){echo $errors['maladie'];} ?></span>
  </div>
  <!-- Details -->
  <div class="detail">
    <label for="detail">Details</label>
    <textarea id="detail" name="detail" row="" cols="80"><?php if(!empty($_POST['detail'])){echo $_POST['detail'];} ?></textarea>
    <span class="error"><?php if(!empty($errors['detail'])){echo $errors['detail'];} ?></span>
  </div>
  <!-- Description -->
  <div class="description">
    <label for="description">Description</label>
    <textarea id="description" name="description" row="" cols="80"><?php if(!empty($_POST['description'])){echo $_POST['description'];} ?></textarea>
    <span class="error"><?php if(!empty($errors['description'])){echo $errors['description'];} ?></span>
  </div>
  <!-- SUBMIT -->
  <div class="form_submit">
    <input type="submit" name="submitted" value="créer">
    <a href="admin_listing_vaccins.php">Retour</a>
  </div>
</form>
</div>
<?php 
include('inc/admin_footer.php');