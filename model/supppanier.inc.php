<?php
include_once("../controller/data.inc.php");
include_once("connexion.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_presta = $_POST['id_presta'];
    $user_id = $_SESSION['user_id']; 

    $stmt = $_bdd->prepare("DELETE FROM achete WHERE id = ? AND id_presta = ?");
    $stmt->execute([$user_id, $id_presta]);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
