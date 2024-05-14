<?php

include_once("./src/data.inc.php");
include_once ("./src/session.inc.php");


if(isset($_POST["update"])) {
    try {
        // Vérifiez si l'utilisateur est connecté
        if(!isset($_SESSION['loggedin'])) {
            // Redirigez l'utilisateur vers la page de connexion si non connecté
            header("Location: connexion.php");
            exit;
        }

        // Récupérez les nouvelles informations de l'utilisateur depuis le formulaire
        $img = $_POST['img'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['Ville'];
        $pays = $_POST['Pays'];
        $tel = $_POST['tel'];

        // Récupérez l'identifiant de l'utilisateur connecté à partir de la session
        $user_id = $_SESSION['user_id'];

        // Préparez la requête de mise à jour
        $query = $_bdd->prepare('UPDATE utilisateur SET img = ?, nom = ?, prenom = ?, mail = ?, adresse = ?, Ville = ?, Pays = ?, tel = ? WHERE id = ?');

        // Exécutez la requête avec les nouvelles informations
        $query->execute([$img, $nom, $prenom, $mail, $adresse, $ville, $pays, $tel, $user_id]);

        // Vérifiez si la requête a été exécutée avec succès
        if($query->rowCount() > 0) {
            // Mettez à jour les informations dans la session
            $_SESSION['img'] = $img;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['mail'] = $mail;
            $_SESSION['adresse'] = $adresse;
            $_SESSION['Ville'] = $ville;
            $_SESSION['Pays'] = $pays;
            $_SESSION['tel'] = $tel;

            // Redirigez l'utilisateur vers une page de confirmation ou de profil mis à jour
            header("Location: profil.php");
            exit;
        } else {
            // La requête de mise à jour n'a pas affecté de lignes (peut-être que l'identifiant de l'utilisateur est incorrect)
            echo "<p class=\"warning\">La mise à jour des informations a échoué. Veuillez réessayer.</p>";
        }
    } catch (Exception $e) {
        // Erreur lors de l'exécution de la requête SQL
        echo "<p class=\"warning\">Erreur lors de la mise à jour des informations. Veuillez réessayer.</p>";
    }
}
?>
