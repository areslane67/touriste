<section class="alo">
    <a href="./profil.php">Paramètres généraux</a>
    <a href="./mdp.php">Mot de passe</a>
    <?php
    if($_SESSION['role'] == 'prestataire') {
        echo '<a href="./prestation.php">Création de prestation</a>';
        echo '<a href="./gesprestation.php">Gestion de prestation</a>';
    }else if($_SESSION['role'] == 'admin'){
        echo '<a href="./gestionutilisateurs.php">gestionnaire des utilisateurs</a>';
    }
    ?>
    <a href="./suppression.php">Supprimer son compte</a>
</section>