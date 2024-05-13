<?php
include_once ("./src/session.inc.php");
include_once ("./src/data.inc.php");

// Définir les variables et les initialiser avec des valeurs vides
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider le nouveau mot de passe
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Veuillez entrer un nouveau mot de passe.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Valider la confirmation du nouveau mot de passe
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Veuillez confirmer le mot de passe.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($new_password !== $confirm_password) {
            $confirm_password_err = "Les mots de passe ne correspondent pas.";
        }
    }

    // Vérifier les erreurs de saisie avant de mettre à jour la base de données
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Préparer une mise à jour
        $sql = "UPDATE utilisateur SET mdp = :mdp WHERE id = :id";

        if ($stmt = $_bdd->prepare($sql)) {
            // Liaison des paramètres
            $stmt->bindParam(":mdp", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);

            // Paramètres
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["user_id"];

            // Exécuter la déclaration préparée
            if ($stmt->execute()) {
                // Rediriger vers une autre page ou afficher un message de confirmation
                session_destroy();
                header("location: change_password_success.php");
                exit;
            } else {
                echo "Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }
        }

        // Fermer la déclaration
        unset($stmt);
    }
}
?>