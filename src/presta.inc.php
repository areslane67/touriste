<?php

include_once("./src/data.inc.php");

try {
    // Préparer la requête SQL pour récupérer toutes les prestations
    $stmt = $_bdd->query("SELECT * FROM prestation");

    // Récupérer toutes les lignes de résultats sous forme de tableau associatif
    $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
}

?>
