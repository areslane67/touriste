<?php
include_once("../controller/data.inc.php");

function supprimerPrestation($prestation_id)
{
    global $_bdd;

    $stmt_achat = $_bdd->prepare("DELETE FROM achete WHERE `id_presta` = ?");
    $stmt_achat->execute([$prestation_id]);

    $stmt_fav = $_bdd->prepare("DELETE FROM favoris WHERE `id_presta` = ?");
    $stmt_fav->execute([$prestation_id]);

    $stmt_photo = $_bdd->prepare("DELETE FROM photo WHERE `id_presta` = ?");
    $stmt_photo->execute([$prestation_id]);

    $stmt_prestation = $_bdd->prepare("DELETE FROM prestation WHERE `id_presta` = ?");
    $stmt_prestation->execute([$prestation_id]);
}


if (isset($_POST['prestation_id'])) {
    $prestation_id = $_POST['prestation_id'];
    supprimerPrestation($prestation_id);

    header("Location: ../index.php");
    exit;
}
