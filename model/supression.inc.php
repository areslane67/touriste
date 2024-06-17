<?php
include_once("../controller/data.inc.php");
include_once("./connexion.inc.php");

if (isset($_SESSION['user_id'])) {
    try {
        $user_id = $_SESSION['user_id'];

        $stmt_delete_achats_user = $_bdd->prepare("DELETE FROM achete WHERE ID = ?");
        $stmt_delete_achats_user->execute([$user_id]);

        $stmt_delete_favoris_user = $_bdd->prepare("DELETE FROM favoris WHERE ID = ?");
        $stmt_delete_favoris_user->execute([$user_id]);

        $stmt_select_prestations = $_bdd->prepare("SELECT id_presta FROM prestation WHERE id = ?");
        $stmt_select_prestations->execute([$user_id]);
        $prestations = $stmt_select_prestations->fetchAll(PDO::FETCH_COLUMN);

        foreach ($prestations as $prestation_id) {
            $stmt_delete_photo = $_bdd->prepare("DELETE FROM photo WHERE id_presta = ?");
            $stmt_delete_photo->execute([$prestation_id]);

            $stmt_delete_achat = $_bdd->prepare("DELETE FROM achete WHERE id_presta = ?");
            $stmt_delete_achat->execute([$prestation_id]);

            $stmt_delete_fav = $_bdd->prepare("DELETE FROM favoris WHERE id_presta = ?");
            $stmt_delete_fav->execute([$prestation_id]);
        }

        $stmt_delete_prestations = $_bdd->prepare("DELETE FROM prestation WHERE id = ?");
        $stmt_delete_prestations->execute([$user_id]);

        $stmt_delete_user = $_bdd->prepare("DELETE FROM utilisateur WHERE id = ?");
        $stmt_delete_user->execute([$user_id]);

        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 86400, '/');
        }
        session_destroy();

        header("Location: ../vue/index.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    header("Location: erreur.php");
    exit;
}
?>
