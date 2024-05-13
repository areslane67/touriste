<?php

// Vérifie si l'utilisateur est connecté et si son rôle n'est pas "prestataire"
if(isset($_SESSION['role']) && $_SESSION['role'] != 'prestataire') {
    // Détruit la session
    session_destroy();
    // Redirige l'utilisateur vers la page de connexion par exemple
    header("Location: ./index.php");
    exit; // Arrête l'exécution du script
}
?>
