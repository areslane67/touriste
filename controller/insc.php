<?php
include_once("../model/insc.inc.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_email = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL);

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_email) || empty($_POST['adresse']) || empty($_POST['mdp']) || empty($_POST['Ville']) || empty($_POST['Pays']) || empty($_POST['tel']) || empty($_POST['role'])) {
        $error_message = "Remplissez tous les champs";
    } else if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Mail invalide";
    } else if ($_POST['mdp'] != $_POST['mdpC']) {
        $error_message = "Les mots de passe ne correspondent pas";
    } else if (!preg_match("/^\d{10}$/", $_POST['tel'])) {
        $error_message = "Le numéro de téléphone doit contenir exactement 10 chiffres";
    } else if (strlen($_POST['mdp']) < 12) {
        $error_message = "Le mot de passe doit contenir plus de 12 caractères";
    } else if ($_POST['role'] == 'prestataire' && !preg_match("/^\d{14}$/", $_POST['siret'])) {
        $error_message = "Le SIRET doit contenir exactement 14 chiffres";
    } else {
        if (check_existing_email($_email, $_bdd)) {
            $error_message = "L'adresse e-mail est déjà utilisée";
        } else {
            if ($_POST['role'] == 'prestataire' && empty($_POST['siret'])) {
                $error_message = "Le champ siret est obligatoire pour les prestataires";
            } else {
                send_data($_POST['img'], $_POST['nom'], $_POST['prenom'], $_email, $_POST['adresse'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['Ville'], $_POST['Pays'], $_POST['tel'], $_POST['role'], $_POST['siret'], $_bdd);
                header("Location: ../vue/connexion.php");
                exit;
            }
        }
    }
}
?>