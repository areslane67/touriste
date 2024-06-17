<?php
include_once("../controller/data.inc.php");
include_once("connexion.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_presta = $_POST['id_presta'];
    $user_id = $_SESSION['user_id']; 

    $stmt = $_bdd->prepare("SELECT COUNT(*) FROM favoris WHERE id = ? AND id_presta = ?");
    $stmt->execute([$user_id, $id_presta]);
    $is_favorite = $stmt->fetchColumn() > 0;

    if ($is_favorite) {
        $stmt = $_bdd->prepare("DELETE FROM favoris WHERE id = ? AND id_presta = ?");
        $stmt->execute([$user_id, $id_presta]);
    } else {
    $stmt = $_bdd->prepare("INSERT INTO favoris (id, id_presta) VALUES (?, ?)");
    $stmt->execute([$user_id, $id_presta]);  
    }


    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>
