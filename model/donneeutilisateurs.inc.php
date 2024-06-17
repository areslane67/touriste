<?php

try {
    $query = "SELECT id, img, nom, prenom, mail, adresse, Ville, Pays, tel, role, siret FROM utilisateur";
    $stmt = $_bdd->query($query);

} catch (Exception $e) {
    echo "<p class=\"warning\">Erreur lors de la récupération des utilisateurs. Veuillez réessayer.</p>";
}
?>