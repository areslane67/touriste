<?php
include_once "connexion.inc.php";
include_once("../controller/data.inc.php");

try {
    
    $id_presta = $_SESSION['user_id'];

    $stmt = $_bdd->prepare("
        SELECT * 
        FROM prestation 
        INNER JOIN favoris ON prestation.id_presta = favoris.id_presta
        JOIN photo ON photo.id_presta = prestation.id_presta
        WHERE favoris.ID = :id_presta
    ");
    
    $stmt->bindParam(':id_presta', $id_presta, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
}
?>
