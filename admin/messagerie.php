<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');

if($_SESSION['user']['role'] == 'admin') {

include('inc/admin_header.php');


$sql = "SELECT * FROM contact ORDER BY id DESC ";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();


?>
<!-- AFFICHAGE DES MESSAGES PROVENANT DU FORMULAIRE -->

<table style="width:80%;margin-left:10px;">
    <tr>
        <th>Expéditeur</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
    </tr>
    <?php foreach ($contacts as $contact) { ?>
        <tr>
            <td><p><?= $contact['nom']; ?></p></td>
            <td><?= $contact['email']; ?></td>
            <td><p><?= $contact['message'];?></p></td>
            <td><?= $contact['created_at']; ?></td>
            <td>

                
            <!-- la fonction voir le message en détail  -->
                <a href="voir.php?id=<?= $contact['id'] ?>">Voir</a>
                <!-- fonction effacer  -->
                <a href="supprimer.php?id=<?= $contact['id'] ?>">Effacer</a>
                
            </td>
        </tr>
    <?php } ?>
</table>

<?php

// debug($contacts);



include('inc/admin_footer.php');

} else {
    redirect('404.php');
}