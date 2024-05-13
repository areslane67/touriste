<?php

include_once("./src/data.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['libelet'], $_POST['tarif'], $_POST['description'], $_POST['image'])) {
        $libelet = $_POST['libelet'];
        $tarif = $_POST['tarif'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        try {
            $stmt = $_bdd->prepare("INSERT INTO prestation (libelet, tarif, description, image, utilisateur_id) VALUES (:libelet, :tarif, :description, :image, :utilisateur_id)");
            $stmt->bindParam(':libelet', $libelet);
            $stmt->bindParam(':tarif', $tarif);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':utilisateur_id', $_SESSION['user_id']);

            $stmt->execute();

            header("Location: ./index.php");
            exit;
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont requis";
    }
}
?>
