<?php

try {
    // Requête pour sélectionner tous les utilisateurs
    $query = "SELECT id, img, nom, prenom, mail, adresse, Ville, Pays, tel, role, siret FROM utilisateur";
    $stmt = $_bdd->query($query);

} catch (Exception $e) {
    // Erreur lors de l'exécution de la requête SQL
    echo "<p class=\"warning\">Erreur lors de la récupération des utilisateurs. Veuillez réessayer.</p>";
}
?>