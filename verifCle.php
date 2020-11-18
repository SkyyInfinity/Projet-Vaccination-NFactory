<?php
include('inc/pdo.php');
include('inc/functions.php');
$erreur_mdp = NULL;
$info_mdp = NULL;

if(!empty($_POST['submit_cle'])) {

    $cle = cleanXss($_POST['input_cle']);
    $mdp1_user = cleanXss($_POST['input1_mdp_user']);
    $mdp2_user = cleanXss($_POST['input2_mdp_user']);

    if(!empty($cle) && !empty($mdp1_user) && !empty($mdp2_user)) {

        $cleS = sha1($cle);     // car la clé est crypté dans la BDD

        $mdp1_user = sha1($mdp1_user);
        $mdp2_user = sha1($mdp2_user);
        $mdp1_userS = ($salt.$mdp1_user);
        $mdp2_userS = ($salt.$mdp2_user);

        // requete SQL pour savoir si clé existe
        $requete_SE = $db->prepare("SELECT * FROM users WHERE cle = :cle_entree LIMIT 1");
        $requete_SE->execute(array('cle_entree' =>$cleS));

        if ($requete_SE->fetchColumn() != 0) {              // si clé existe

            if($mdp1_userS==$mdp2_userS) {

                // requete SQL pour modifier mdp
                $requete_UP=$db->prepare("UPDATE users SET passsword = :nouveau_mdp WHERE cle = :cle_entree LIMIT 1");
                $requete_UP->execute(array('nouveau_mdp'=>$mdp1_userS, 'cle_entree'=>$cleS));

                $info_mdp = '<span class="vert bold">Le mot de passe a bien été modifié.</span>';

                // requete SQL pour supprimer clé, après que mdp soit changé
                $requete_UP = $db->prepare("UPDATE utilisateurs SET cle = :lacle WHERE cle = :cle_entree LIMIT 1");
                $requete_UP->execute(array('lacle'=>NULL, 'cle_entree'=>$cleS));
                $requete_UP->closeCursor();

            }
            else {
                $erreur_mdp = '<span class="rouge bold">Le mot de passe doit être identique dans les deux champs.</span>';
            }

        }
        else {
            $erreur_mdp = '<span class="rouge bold">La clé entrée n\'existe pas !</span>';
        }

    }
   else {
        $erreur_mdp = '<span class="rouge bold">Veuillez entrer tout les champs</span>';
    }

}   // END if(!empty($_POST['submit_cle']))

include('inc/header.php');
?>

<form action="verification_cle.php" method="POST">
    <label class="ancien-mdp" for="id_cle_user">Entrez la clé reçu par mail :</label>
    <input class="input-text" type="text" name="input_cle" id="id_cle_user" required><br>

    <label class="nouv-mdp" for="id_mdp1_user">Nouveau mot de passe :</label>
    <input class="input-passwd" type="password" name="input1_mdp_user" id="id_mdp1_user" required><br>

    <label class="confirm-mdp" for="id_mdp2_user">Confirmer le mot de passe :</label>
    <input class="input-passwd" type="password" name="input2_mdp_user" id="id_mdp2_user" required>

    <input type="submit" name="submit_cle" value="Envoyer">

        <?php echo $info_mdp; ?>
        <?php echo $erreur_mdp; ?>
</form>

<?=
include('inc/header.php');
