<?php

session_start();

if(isset($_POST["mail"]) && isset($_POST["mdp"])){
    try {
        $login = $_POST["mail"];
        $mdp = $_POST["mdp"];

        $query = "SELECT id, img, nom, prenom, mail, adresse, mdp, Ville, Pays, tel, role, siret FROM utilisateur WHERE mail = ? LIMIT 1";
        $stmt = $_bdd->prepare($query);
        $stmt->execute([$login]);
        $DATA = $stmt->fetch();

        if(!$login || !$mdp){
            echo "<p class=\"warning\">Vous avez oublié votre mail ou votre mot de passe?</p>";
        } else if($DATA && password_verify($mdp, $DATA['mdp'])) {
            // Authentification réussie : enregistrement des données utilisateur dans la session
            $_SESSION['loggedin'] = true; // Définition de la variable de session pour indiquer que l'utilisateur est connecté
            $_SESSION['user_id'] = $DATA['id'];
            $_SESSION['img'] = $DATA['img'];
            $_SESSION['nom'] = $DATA['nom'];
            $_SESSION['prenom'] = $DATA['prenom'];
            $_SESSION['mail'] = $DATA['mail'];
            $_SESSION['adresse'] = $DATA['adresse'];
            $_SESSION['Ville'] = $DATA['Ville'];
            $_SESSION['Pays'] = $DATA['Pays'];
            $_SESSION['tel'] = $DATA['tel'];
            $_SESSION['role'] = $DATA['role'];
            $_SESSION['siret'] = $DATA['siret'];

            // Redirection vers la page d'accueil
            header("Location: index.php");
            exit;
        } else {
            // Identifiants incorrects
            echo "<p class=\"warning\">Erreur : mail ou mot de passe incorrect.</p>";
        }
    } catch (Exception $e) {
        // Erreur lors de l'exécution de la requête SQL
        echo "<p class=\"warning\">Erreur lors de l'authentification. Veuillez réessayer.</p>";
    }
}
?>