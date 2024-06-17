<?php
include_once "../model/prestasess.php";
include_once "../model/connexion.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once("../template/css.php");
    ?>
    <title>Document</title>
</head>

<body>
    <?php
    include_once "../template/header.php";
    ?>
    <main class="achat">

        <?php
        include_once "../model/modifpresta.inc.php";

        $is_favorite = false;
        if (isset($_SESSION['user_id'])) {
            $is_favorite = isFavorite($_SESSION['user_id'], $user['id_presta'], $_bdd);
        }

        $heart_color = $is_favorite ? "❤️" : "🤍";
        echo "
                <section class=\"infopresta\" data-uid=" . $user['id_presta'] . "> 

                    <ul>
                        " . (isset($_SESSION['user_id']) ? "
                        <form class=\"favorite-form\" method=\"post\" action=\"../model/favorite.inc.php\">
                            <input type=\"hidden\" name=\"id_presta\" value=\"{$user['id_presta']}\">
                            <button type=\"submit\" class=\"favorite-button\">{$heart_color}</button>
                        </form>
                        " : "") . "
                        <div>
                            <li> <img src='{$user['photo']}' alt='Image de la prestation'> </li>
                        </div>
                        <div class=\"infopresta\">
                            <h2><strong>{$user['libelet']}</strong></h2>
                            <li> <h2>Tarif:{$user['tarif']} €</h2> </li>
                            <li> <p><strong>Note:</strong></p> </li>
                            <li> <p><strong>Description:</strong> {$user['description']} </p> </li>
                        </div>
                    </ul>

                </section>";
        ?>
        <section>
            <div class="infopresta">
                <?php
                echo "
                <section class=\"polo\" data-uid=" . $user['id_presta'] . "> 

                    <ul>
                            <li> <p><strong>Mail du professionnel:</strong>{$user['mail']}</h2> </p>
                            <li> <p><strong>Numero du professionnel:</strong> {$user['tel']} </p> </li>
                    </ul>

                </section>";
                ?>
            </div>
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '
                    <section class="achete">
                        <form class="achat" method="post" action="../model/achete.inc.php">
                            <input type="hidden" name="id_presta" value="' . $user['id_presta'] . '">
                            <button type="submit" class="achat-butto">acheter</button>
                        </form>
                    </section>
                    ';
                } else {
                    echo '
                    <section class="achete">
                        <form class="achat" method="post" action="./inscription.php">
                            <input type="hidden" name="id_presta" value="' . $user['id_presta'] . '">
                            <button type="submit" class="achat-butto">insrivez vous</button>
                        </form>
                    </section>
                    ';
                }
                ?>
        </section>


    </main>
    <?php
    include_once("../template/footer.php");
    ?>
</body>

</html>