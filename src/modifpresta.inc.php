<?php
include_once("./src/data.inc.php");

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $libelet = $_POST['libelet'];
    $tarif = $_POST['tarif'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Update the prestation information in the database
    $stmt = $_bdd->prepare("UPDATE prestation SET libelet = ?, tarif = ?, description = ?, image = ? WHERE `id-presta` = ?");
    $stmt->execute([$libelet, $tarif, $description, $image, $_GET['id-presta']]);

    // Redirect to the same page to avoid resubmission
    header("Location: {$_SERVER['PHP_SELF']}?id-presta={$_GET['id-presta']}");
    exit;
}

// Retrieve prestation details
$user_id = $_GET['id-presta'];
$user = $_bdd->prepare("SELECT * FROM prestation WHERE `id-presta` = ?");
$user->execute([$user_id]);
$user = $user->fetch();
?>