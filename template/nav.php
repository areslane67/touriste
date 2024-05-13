<section class="alo">
    <a href="./profil.php">Paramètres généraux</a>
    <a href="./mdp.php">Mot de passe</a>
    <?php
    // Vérifie si l'utilisateur est un prestataire
    if($_SESSION['role'] == 'prestataire') {
        echo '<a href="./prestation.php">Création de prestation</a>';
        echo '<a href="./gesprestation.php">Gestion de prestation</a>';
    }
    ?>
    <a href="./suppression.php">Supprimer son compte</a>
</section>