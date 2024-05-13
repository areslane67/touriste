<?php
include_once("./data.inc.php");

// Fonction de suppression d'une prestation
function supprimerPrestation($prestation_id) {
    global $_bdd;
    $stmt = $_bdd->prepare("DELETE FROM prestation WHERE `id-presta` = ?");
    $stmt->execute([$prestation_id]);
}

// Vérifie si le formulaire de suppression est soumis
if(isset($_POST['prestation_id'])) {
    $prestation_id = $_POST['prestation_id'];
    supprimerPrestation($prestation_id);
    // Redirige vers une autre page après la suppression
    header("Location: ../index.php");
    exit;
}

?>