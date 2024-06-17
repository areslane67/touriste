<?php

include_once("../controller/data.inc.php");
include_once("connexion.inc.php");

try {
    $stmt = $_bdd->prepare("SELECT * 
                            FROM prestation 
                            INNER JOIN photo ON prestation.id_presta = photo.id_presta
                            WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();

    $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['prestations'] = $prestations;

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
}

?>