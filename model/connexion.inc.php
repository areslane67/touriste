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
            $_SESSION['loggedin'] = true; 
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

            header("Location: index.php");
            exit;
        } else {
            echo "<p class=\"warning\">Erreur : mail ou mot de passe incorrect.</p>";
        }
    } catch (Exception $e) {
        echo "<p class=\"warning\">Erreur lors de l'authentification. Veuillez réessayer.</p>";
    }
}

function isFavorite($user_id, $id_presta, $db) {
    $stmt = $db->prepare("SELECT COUNT(*) FROM favoris WHERE id = ? AND id_presta = ?");
    $stmt->execute([$user_id, $id_presta]);
    return $stmt->fetchColumn() > 0;

    
}
?>

