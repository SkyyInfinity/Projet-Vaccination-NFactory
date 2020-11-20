<?php
session_start();
//session_start();
require('../vendor/autoload.php');
include('../inc/pdo.php');
include('../inc/functions.php');
use JasonGrimes\Paginator;

if($_SESSION['user']['role'] == 'admin') {
///////////////////////////////////////////////////////////////////////////////
///////////// PAGINATION //////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
$errors = array();
//Nombre d'elements
$itemsPerPage = 5;
// Page courante
$currentPage = 1;
// Offset
$offset = 0;

if(!empty($_GET['page'])) {
  $currentPage = $_GET['page'];
  $offset = $currentPage * $itemsPerPage - $itemsPerPage;
}
$sql = "SELECT COUNT(id) FROM users";
$query = $pdo->prepare($sql);
$query->execute();
$totalItems = $query->fetchColumn();

$urlPattern = 'admin_listing_users.php?page=(:num)';

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
///////////////////////////////////////////////////////////////////////////////////
////////// Affichage des utilisateurs ////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM users ORDER BY nom ASC LIMIT $offset,$itemsPerPage";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();
//debug($users);

include('inc/admin_header.php');
?>
  <div class="wrap">
      <h1>Tableau users | MODERATION</h1>
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
      <?php echo '<div class="pagination">' . $paginator . '</div>'; ?>
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
    </div>
  <?php  include('inc/admin_footer.php');
} else {
  redirect('404.php');
}