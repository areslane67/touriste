<?php
include_once("./data.inc.php");
include_once("./connexion.inc.php");

if(isset($_SESSION['user_id'])){
    if(!isset($_bdd)) {
        echo "Erreur : La connexion à la base de données n'est pas établie.";
        exit;
    }

    $id_utilisateur = $_SESSION['user_id'];

    $requete = $_bdd->prepare("DELETE FROM utilisateur WHERE id = :id_utilisateur");
    $requete->bindParam(':id_utilisateur', $id_utilisateur);

    if($requete->execute()) {
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(), '', time() - 86400, '/');
        }
        session_destroy();

        header("Location: ../index.php");
        exit;
    } else {
        echo "Erreur de requête SQL : " . $requete->errorInfo()[2];
        exit;
    }
} else {
    header("Location: erreur.php");
    exit;
}
?>
