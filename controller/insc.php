<?php

include_once("./model/insc.inc.php");

if(isset($_POST['mail']) || isset($_POST['mdp'])){
    $_email = $_POST["mail"];

    // On vérifie si tous les champs requis sont remplis
    if(!$_POST['nom'] || !$_POST['prenom'] || !$_POST['mail'] || !$_POST['adresse'] || !$_POST['mdp'] || !$_POST['Ville'] || !$_POST['Pays'] || !$_POST['tel'] || !$_POST['role']){
        echo "<p class=\"warning\">Remplissez tous les champs</p>";
    } else if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){
        // On vérifie si l'email est valide
        echo "<p class=\"warning\">Mail invalide</p>";
    } else if($_POST['mdp'] != $_POST['mdpC']){
        // On vérifie si les mots de passe correspondent
        echo "<p class=\"warning\">Les mots de passe ne correspondent pas</p>";
    } else {
        // Vérification si l'e-mail est déjà existant
        $existing_email = check_existing_email($_email, $_bdd);
        if($existing_email){
            echo "<p class=\"warning\">L'adresse e-mail est déjà utilisée</p>";
        } else {
            // Si le rôle est prestataire, on vérifie si le champ siret est rempli
            if($_POST['role'] == 'prestataire' && empty($_POST['siret'])){
                echo "<p class=\"warning\">Le champ siret est obligatoire pour les prestataires</p>";
            } else {
                // Sinon, tous les champs sont valides, on peut envoyer les données
                send_data($_POST['img'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['adresse'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['Ville'], $_POST['Pays'], $_POST['tel'], $_POST['role'], $_POST['siret'], $_bdd);
                // Redirection vers la page de connexion
                header("Location: connexion.php");
                exit;
            }
        }
    }                
}
?>
