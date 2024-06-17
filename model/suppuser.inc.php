<?php
include_once("../controller/data.inc.php");

if (isset($_GET['id-bob'])) {
    $user_id = $_GET['id-bob'];

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        try {
            $query = $_bdd->prepare("DELETE FROM utilisateur WHERE `id` = :user_id");
            $query->execute(['user_id' => $user_id]);

            if ($query->rowCount() > 0) {
                header("Location: ../gestionutilisateurs.php");
            } else {
                echo "L'utilisateur avec l'ID spécifié n'existe pas.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        }
    }
} else {
    echo "L'ID de l'utilisateur n'a pas été spécifié dans l'URL.";
}
?>
