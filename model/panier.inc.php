<?php
include_once "connexion.inc.php";
include_once "../controller/data.inc.php";


if(isset($_SESSION['user_id'])) {
    try {
        $id_presta = $_SESSION['user_id'];

        $stmt = $_bdd->prepare("
            SELECT * 
            FROM prestation 
            INNER JOIN achete ON prestation.id_presta = achete.id_presta
            INNER JOIN photo ON photo.id_presta = prestation.id_presta
            WHERE achete.ID = :id_presta
        ");

        $stmt->bindParam(':id_presta', $id_presta, PDO::PARAM_INT);

        $stmt->execute();

        $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tarif_count = count(array_filter($prestations, function($prestation) {
            return !empty($prestation['tarif']);
        }));

        $stmt_count = $_bdd->prepare("
            SELECT SUM(tarif) AS tarif_count, COUNT(tarif) AS pres
            FROM prestation 
            INNER JOIN achete ON prestation.id_presta = achete.id_presta
            INNER JOIN photo ON photo.id_presta = prestation.id_presta
            WHERE achete.ID = :id_presta
        ");

        $stmt_count->bindParam(':id_presta', $id_presta, PDO::PARAM_INT);

        $stmt_count->execute();

        $tarif_count_result = $stmt_count->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
    }
}
?>
