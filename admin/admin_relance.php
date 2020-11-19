<?php
include('../inc/pdo.php');
include('../inc/functions.php');
// INSERT INTO
$newsubject = 'Vaccin';
$newmessage = 'pensez à faire vos Vaccins';
$newuseremail = 'contact@myvaccine.org';
$statut = 'new';
$nom = 'MyVaccine.org';

$sql = "INSERT INTO contact (nom, email, message,created_at, statut) VALUES (:nom,:email,:message,NOW(), :statut)";
$query = $pdo->prepare($sql);
$query->bindValue(':nom',$nom,PDO::PARAM_STR);
$query->bindValue(':email',$newuseremail,PDO::PARAM_STR);
$query->bindValue(':message',$newmessage,PDO::PARAM_STR);
$query->bindValue(':statut',$statut,PDO::PARAM_STR);
$query->execute();

?>
