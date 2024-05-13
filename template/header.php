<header>
        <div>
            <a href="./index.php"><img src="./assets/scary_halloween_dead_danger_skull_gaming_controller_console_game_icon_262396.png" alt="icon menu"></a>
        </div>
        <div class="burger-menu">
            <div class="burger" onclick="toggleMenu()">
                <img src="./assets/menu_circular_button_burger_icon_124214.png" alt="img">
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