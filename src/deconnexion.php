<?php
session_start();

// détruire la session
session_destroy();

// rediriger l'utilisateur vers la page de connexion
header("Location: ../index.php");
exit;
?>
