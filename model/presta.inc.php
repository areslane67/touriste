<?php

include_once("../controller/data.inc.php");

try {
    $stmt = $_bdd->query("
        SELECT * 
        FROM prestation 
        INNER JOIN photo ON prestation.id_presta = photo.id_presta
    ");
    
    $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
}

?>
