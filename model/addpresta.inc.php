<?php

include_once("../controller/data.inc.php");

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['libelet'], $_POST['tarif'], $_POST['description'], $_POST['photo'])) {
        $libelet = trim($_POST['libelet']);
        $tarif = trim($_POST['tarif']);
        $description = trim($_POST['description']);
        $image = trim($_POST['photo']);

        if (!is_numeric($tarif)) {
            $error_message = "Le tarif doit être un nombre";
        } elseif (!isset($_SESSION['user_id'])) {
            $error_message = "Vous devez être connecté pour ajouter une prestation";
        } else {
            try {
                $stmt = $_bdd->prepare("INSERT INTO prestation (libelet, tarif, description, id) VALUES (:libelet, :tarif, :description, :id)");
                $stmt->bindParam(':libelet', $libelet);
                $stmt->bindParam(':tarif', $tarif);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':id', $_SESSION['user_id']);
                $stmt->execute();

                $prestation_id = $_bdd->lastInsertId();

                $stmt = $_bdd->prepare("INSERT INTO photo (ID_PRESTA, PHOTO) VALUES (:id_presta, :photo)");
                $stmt->bindParam(':id_presta', $prestation_id);
                $stmt->bindParam(':photo', $image);
                $stmt->execute();

                header("Location: ./index.php");
                exit;
            } catch (PDOException $e) {
                $error_message = "Erreur d'insertion : " . $e->getMessage();
            }
        }
    } else {
        $error_message = "Tous les champs sont requis";
    }
}
?>