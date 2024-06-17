<?php
include_once "../model/prestasess.php";

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
    <main class="profil">
    <?php
    include_once "../template/nav.php";
    ?>
    <section class="right">
        <?php    
    if (!empty($prestations)) {
        foreach ($prestations as $prestation) {
            echo "
                <section class=\"presta\" data-uid=" . $prestation['id_presta'] . ">
                        <ul>
                            <li> <img src='{$prestation['photo']}' alt='Image de la prestation'> </li>
                            <div class=\"right\"> <!-- Ajoutez une classe pour la mise en forme à droite -->
                                <h2> Titre: {$prestation['libelet']}</h2>
                                <li> <p><strong>Tarif:</strong> {$prestation['tarif']} €</p> </li>
                                <li> <p><strong>Note:</strong>  </p> </li>
                                <li> <p><strong>Description:</strong> {$prestation['description']} </p> </li>
                            </div>
                        </ul>
                </section>";
                }
            } else {
                echo "<p class=\"empty2\">Vous avez aucune prestation</p>";
            }
                ?>
    </section>



    </main>
    <?php
    include_once("../template/footer.php");
    ?>
    <script src="../js/click.js"></script>

</body>
</html>
