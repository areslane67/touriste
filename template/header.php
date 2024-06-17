<header>
    <div>
        <a href="./index.php"><img src="../assets/LogoSample_ByTailorBrands-removebg-preview.png" alt="icon menu"></a>
    </div>
    <div class="burger-menu">
            <div class="burger" onclick="toggleMenu()">
                <?php
                if (isset($_SESSION['img']) && !empty($_SESSION['img'])) {
                    echo '<img src="' . $_SESSION['img'] . '" class="up">';
                } else {
                    echo '<img src="../assets/1486485581-account-audience-person-customer-profile-user_81164.png" class="up" alt="user icon">';
                }
                ?>
                <img src="../assets/down_angle_icon_194685.png" alt="img" class="down">
            </div>

            <ul class="menu" id="menu">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '
                    <li><img src="../assets/heart_empty_icon_178700.png" alt="icon favoris"><a href="./fav.php">Listes de favoris</a></li>
                    <li><img src="../assets/settings_user_profile_icon_188630.png" alt="icon reglage"><a href="./profil.php">Profile</a></li>
                    <li><img src="../assets/logout_icon_151219.png" alt="icon deconnexion"><a href="../controller/deconnexion.php">Déconnexion</a></li>
                    ';
                } else {
                    echo '
                    <li><img src="../assets/4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt="icon connexion"><a href="./connexion.php">Se connecter/S\'inscrire</a></li>
                    ';
                }
                ?>
            </ul>
    </div>
    <a href="../vue/panier.php" class="achat"><img src="../assets/online_store_sale_cart_business_ecommerce_basket_bag_buy_shop_shopping_icon_259583.png" alt="icon menu" class="achat"></a>
        <?php

            if (isset($_SESSION['role'])) {
            echo '<button class="burger-button" onclick="alo()">☰</button>';
            echo '<section class="balo">';
            
            echo '<button class="burger-button" onclick="alo()">X</button>';
            
            echo '<a href="../vue/profil.php">Paramètres généraux</a> <hr>';
            echo '<a href="../vue/mdp.php">Mot de passe</a> <hr>';
            
            if ($_SESSION['role'] == 'prestataire') {
                echo '<a href="../vue/prestation.php">Création de prestation</a> <hr>';
                echo '<a href="../vue/gesprestation.php">Gestion de prestation</a> <hr>';
            } else if ($_SESSION['role'] == 'admin') {
                echo '<a href="../vue/gestionutilisateurs.php">Gestionnaire des utilisateurs</a> <hr>';
            }
            
            echo '<a href="./suppression.php">Supprimer son compte</a>';
            
            echo '</section>'; 
        }
        ?>

</header>