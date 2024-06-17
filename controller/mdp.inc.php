<?php
include_once "session.inc.php";
include_once "data.inc.php";

global $_bdd;

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Veuillez entrer un nouveau mot de passe.";
    } else if (strlen(trim($_POST["new_password"])) < 12) {
        $new_password_err = "Le mot de passe doit contenir au moins 6 caractères.";
    } else if (!preg_match('/[A-Z]/', $new_password)) {
        $new_password_err = "Le mot de passe doit contenir au moins une lettre majuscule.";
    } else if (!preg_match('/[\W]/', $new_password)) {
        $new_password_err = "Le mot de passe doit contenir au moins un caractère spécial.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Veuillez confirmer le mot de passe.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($new_password !== $confirm_password) {
            $confirm_password_err = "Les mots de passe ne correspondent pas.";
        }
    }

    if (empty($new_password_err) && empty($confirm_password_err)) {
        $sql = "UPDATE utilisateur SET mdp = :mdp WHERE id = :id";

        if ($stmt = $_bdd->prepare($sql)) {
            $stmt->bindParam(":mdp", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["user_id"];

            if ($stmt->execute()) {
                session_destroy();
                header("location: controller/deconnexion.php");
                exit;
            } else {
                echo "Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }
        }

        unset($stmt);
    }
}
?>