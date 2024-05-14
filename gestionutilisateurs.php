<?php
include_once("./src/session.inc.php");
include_once("./src/data.inc.php");

// Ensuite, vous pouvez vérifier l'état de la session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once("./template/css.php");
    ?>
    <title>Document</title>
</head>
<body>
    <?php
    include_once "./template/header.php";
    ?>
    <main class="profil">
    <?php
    include_once "./template/nav.php";
    ?>
    <section class="utilisateurs">
    <?php
        include_once "./src/donneeutilisateurs.inc.php";

        foreach ($stmt as $row) {
            echo "<section class=\"user\" data-uid=" . $row['id'] . ">
                    <ul>";

            // Vérifier si l'image est définie et non vide
            if(isset($row['img']) && !empty($row['img'])) {
                // Afficher l'image de la session
                echo '<img src="' . $row['img'] . '" class="up">';
            } else {
                // Sinon, afficher l'image par défaut
                echo '<img src="./assets/1486485581-account-audience-person-customer-profile-user_81164.png" class="up">';
            }

            // Afficher les autres informations de l'utilisateur
            echo "  
                    <li><p><strong>ID: </strong>" . $row['id'] . "</p></li>
                    <li><p><strong>Nom: </strong>" . $row['nom'] . " " . $row['prenom'] . "</p></li>
                    <li><p><strong>Mail:</strong> " . $row['mail'] . "</p></li>
                    <li><p><strong>Adresse:</strong> " . $row['adresse'] . "</p></li>
                    <li><p><strong>Ville:</strong> " . $row['Ville'] . "</p></li>
                    <li><p><strong>Pays:</strong> " . $row['Pays'] . "</p></li>
                    <li><p><strong>Téléphone:</strong> " . $row['tel'] . "</p></li>
                    <li><p><strong>Rôle:</strong> " . $row['role'] . "</p></li>
                    <li><p><strong>SIRET:</strong> " . $row['siret'] . "</p></li>
                </ul>
            </section>";
        }

?>

    </section>

    </main>
    <?php
    include_once("./template/footer.php");
    ?>

</body>
</html>
