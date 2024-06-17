<?php
include_once("../controller/data.inc.php");

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_url = $_POST['photo'];

    $stmt_photo = $_bdd->prepare("UPDATE photo SET photo = ? WHERE id_presta = ?");
    $stmt_photo->execute([$image_url, $_GET['id-presta']]);

    $libelet = $_POST['libelet'];
    $tarif = $_POST['tarif'];
    $description = $_POST['description'];

    if (!is_numeric($tarif)) {
        $error_message = "Le tarif doit être un nombre";
    } else {
        $stmt_prestation = $_bdd->prepare("UPDATE prestation SET libelet = ?, tarif = ?, description = ? WHERE id_presta = ?");
        $stmt_prestation->execute([$libelet, $tarif, $description, $_GET['id-presta']]);

        header("Location: " . $_SERVER['PHP_SELF'] . "?id-presta=" . $_GET['id-presta']);
        exit;
    }
}

$user_id = $_GET['id-presta'];
$user = $_bdd->prepare("SELECT * 
                        FROM prestation 
                        INNER JOIN photo ON prestation.id_presta = photo.id_presta
                        JOIN utilisateur ON prestation.id = utilisateur.id
                        WHERE photo.id_presta = ?");
$user->execute([$user_id]);
$user = $user->fetch();
?>