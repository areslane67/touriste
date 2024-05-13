<?php

include_once("./src/data.inc.php");
include_once("./src/connexion.inc.php");

try {
    // Préparer la requête SQL pour récupérer toutes les prestations de l'utilisateur connecté
    $stmt = $_bdd->prepare("SELECT * FROM prestation WHERE utilisateur_id = :utilisateur_id");
    $stmt->bindParam(':utilisateur_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer toutes les lignes de résultats sous forme de tableau associatif
    $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Stocker les données des prestations dans $_SESSION['prestations']
    $_SESSION['prestations'] = $prestations;

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des prestations : " . $e->getMessage();
}
?>
