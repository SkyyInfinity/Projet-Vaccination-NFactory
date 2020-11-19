<?php

session_start();
require('../vendor/autoload.php');
include('../inc/pdo.php');
include('../inc/functions.php');
use JasonGrimes\Paginator;

if($_SESSION['user']['role'] == 'admin') {
$errors = array();
//////////////////////////////////// pagination ////////////////////////////

//Nombre d'elements
$itemsPerPage = 6;
// Page courante
$currentPage = 1;
// Offset
$offset = 0;

if(!empty($_GET['page'])) {
  $currentPage = $_GET['page'];
  $offset = $currentPage * $itemsPerPage - $itemsPerPage;
}
$sql = "SELECT COUNT(id) FROM vaccins";
$query = $pdo->prepare($sql);
$query->execute();
$totalItems = $query->fetchColumn();

$urlPattern = 'admin_listing_vaccins.php?page=(:num)';

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

/////////////////////////////////////////////////////////////////////////
/////////////////////// affichage des vaccins ///////////////////////////
////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM vaccins ORDER BY id DESC LIMIT $offset,$itemsPerPage";
$query = $pdo->prepare($sql);
$query->execute();
$vaccins = $query->fetchAll();
/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
include('inc/admin_header.php');?>

    <div class="wrap">
      <h1>Tableau des vaccins | MODERATION</h1>
        <?php echo '<div class="pagination">' . $paginator . '</div>'; ?>
        <style>
          .pagination{
            text-align: center;
          }
          .pagination li{
            display: inline-block;
            margin: 0 10px;
          }
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
      <div class="creation">
      <a href="admin_creation_vaccins.php">creation vaccin</a>
      </div>
      <!-- liste des vaccins  -->
      <?php foreach ($vaccins as $vaccin): ?>

          <div class="users">

            <ul>
              <li>
                <p>Vaccin | <?php echo $vaccin['nom']; ?></p>
                <p>Maladie ciblées | <?php echo $vaccin['maladie_ciblées']; ?></p>
                <a href="admin_delete_vaccins.php?id=<?= $vaccin['id'] ?>">Supprimer</a>
                <a href="admin_voir_vaccins.php?id=<?= $vaccin['id'] ?>">Voir</a>
              </li>
            </ul>
        </div>

      <?php endforeach; ?>
      </div>
    <?php  include('inc/admin_footer.php');
} else {
  redirect('404.php');
}