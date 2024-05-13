<?php
session_start(); // Démarrage de la session

// Vérifier si l'utilisateur est déjà connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>
