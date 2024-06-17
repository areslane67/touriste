<?php

include_once("../controller/data.inc.php");
include_once ("../controller/session.inc.php");


if(isset($_POST["update"])) {
    try {
        if(!isset($_SESSION['loggedin'])) {
            header("Location: connexion.php");
            exit;
        }

        $img = $_POST['img'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['Ville'];
        $pays = $_POST['Pays'];
        $tel = $_POST['tel'];

        $user_id = $_SESSION['user_id'];

        $query = $_bdd->prepare('UPDATE utilisateur SET img = ?, nom = ?, prenom = ?, mail = ?, adresse = ?, Ville = ?, Pays = ?, tel = ? WHERE id = ?');

        $query->execute([$img, $nom, $prenom, $mail, $adresse, $ville, $pays, $tel, $user_id]);

        if($query->rowCount() > 0) {
            $_SESSION['img'] = $img;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['mail'] = $mail;
            $_SESSION['adresse'] = $adresse;
            $_SESSION['Ville'] = $ville;
            $_SESSION['Pays'] = $pays;
            $_SESSION['tel'] = $tel;

            header("Location: profil.php");
            exit;
        } else {
            echo "<p class=\"warning\">La mise à jour des informations a échoué. Veuillez réessayer.</p>";
        }
    } catch (Exception $e) {
        echo "<p class=\"warning\">Erreur lors de la mise à jour des informations. Veuillez réessayer.</p>";
    }
}
?>
