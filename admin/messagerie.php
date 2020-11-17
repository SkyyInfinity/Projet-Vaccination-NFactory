<?php
include('../inc/pdo.php');


include('../inc/functions.php');
include('inc/admin_header.php');


$sql = "SELECT * FROM contact ORDER BY id DESC ";
$query = $pdo -> prepare($sql);
$query->execute();
$contacts = $query->fetchAll();


?>

<table style="width:100%;">
  <tr>
    <th>id</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
  </tr>
  <?php foreach ($contacts as $contact) { ?>
      <tr>
        <td><?= $contact['id']; ?></td>
        <td><?= $contact['nom']; ?></td>
        <td><?= $contact['email']; ?></td>
        <td><?= $contact['message']; ?></td>
        <td><?= $contact['created_at']; ?></td>
        <td>
            <a href="editpost.php?id=<?php echo $contact['id']; ?>">Lire</a>
            <a href="#">Effacer</a>
            <!-- les fonctions lire et effacer ne foncitonnent pas  -->
        </td>
      </tr>
  <?php } ?>
</table>

<?php

// debug($contacts);



include('inc/admin_footer.php');









