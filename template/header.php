<header>
        <div>
            <a href="./index.php"><img src="./assets/scary_halloween_dead_danger_skull_gaming_controller_console_game_icon_262396.png" alt="icon menu"></a>
        </div>
        <div class="burger-menu">
        <div class="burger" onclick="toggleMenu()">
            <?php
            if(isset($_SESSION['img']) && !empty($_SESSION['img'])) {
                // Si $_SESSION['img'] est défini et non vide, afficher l'image de la session
                echo '<img src="' . $_SESSION['img'] . '" class="up">';
            } else {
                // Sinon, afficher l'image par défaut
                echo '<img src="./assets/1486485581-account-audience-person-customer-profile-user_81164.png" class="up">';
            }
            ?>
            <img src="./assets/down_angle_icon_194685.png" alt="img" class="down">
        </div>

            <ul class="menu" id="menu">
                <?php
                // Vérifier si une session est ouverte
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    // Si une session est ouverte, afficher toutes les listes sauf "Se connecter/S'inscrire"
                    echo '
                    <li><img src="./assets/heart_empty_icon_178700.png" alt="icon favoris"><a href="#">Listes de favoris</a></li>
                    <li><img src="./assets/settings_user_profile_icon_188630.png" alt="icon reglage"><a href="./profil.php">Profile</a></li>
                    <li><img src="./assets/logout_icon_151219.png" alt="icon deconnexion"><a href="./src/deconnexion.php">Déconnexion</a></li>
                    ';
                } else {
                    // Si aucune session n'est ouverte, afficher uniquement "Se connecter/S'inscrire"
                    echo '
                    <li><img src="./assets/4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt="icon connexion"><a href="./connexion.php">Se connecter/S\'inscrire</a></li>
                    ';
                }
                ?>
            </ul>
        </div>
    </header>