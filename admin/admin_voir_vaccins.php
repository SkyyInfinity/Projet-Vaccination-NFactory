<?php
//session_start();
include('../inc/pdo.php');
include('../inc/functions.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

$sql = "SELECT * FROM vaccins WHERE id=:id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$vaccin = $query->fetch();

} else {
  redirect('404.php');
}
//debug($users);
// pagination //

// requete modifier, supprimer //

include('inc/admin_header.php');?>




    <div class="wrap">
      <h1>Tableau des vaccins | MODERATION</h1>
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

          <div class="users">
            <ul>
              <li>
                <p>Vaccin: <?php echo $vaccin['nom']; ?></p>
                <p>Detail vaccin: <br><br> <?php echo $vaccin['details']; ?></p>
                <p>Presentation: <br><br> <?php echo $vaccin['presentation']; ?></p>
                <a href="admin_modif_vaccins.php?id=<?= $vaccin['id'] ?>">Modifier</a>
                <a href="admin_listing_vaccins.php">Retour</a>
              </li>
            </ul>
          </div>
    </div>
<?php include('inc/admin_footer.php');
