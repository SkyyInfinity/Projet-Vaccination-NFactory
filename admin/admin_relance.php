<?php
// INSERT INTO
$newsubject = 'Vaccin';
$newmessage = 'pensée a faire vos Vaccin';
$newuseremail = $email;

$sql = "INSERT INTO message-user (message,subject,useremail,created_at) VALUES (:message,:subject,:useremail,NOW())";
$query = $pdo->prepare($sql);
$query->bindValue(':message',$newmessage,PDO::PARAM_STR);
$query->bindValue(':subject',$newsubject,PDO::PARAM_STR);
$query->bindValue(':useremail',$newuseremail,PDO::PARAM_STR);

?>
