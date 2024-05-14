<?php
include_once("./data.inc.php");
include_once("./connexion.inc.php");

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['user_id'])){
    try {
        $user_id = $_SESSION['user_id'];

        // Supprimer les prestations associées à l'utilisateur
        $stmt_delete_prestations = $_bdd->prepare("DELETE FROM prestation WHERE utilisateur_id = ?");
        $stmt_delete_prestations->execute([$user_id]);

        // Supprimer l'utilisateur
        $stmt_delete_user = $_bdd->prepare("DELETE FROM utilisateur WHERE id = ?");
        $stmt_delete_user->execute([$user_id]);

        // Détruire la session
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(), '', time() - 86400, '/');
        }
        session_destroy();

        // Rediriger vers une autre page après la suppression
        header("Location: ../index.php");
        exit;
    } catch(PDOException $e) {
        // Gérer les erreurs PDO
        echo "Erreur: " . $e->getMessage();
    }
} else {
    // Rediriger vers une page d'erreur si l'utilisateur n'est pas connecté
    header("Location: erreur.php");
    exit;
}
?>
