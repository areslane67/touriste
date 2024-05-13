<?php
include_once "./src/prestasess.php";
include_once("./src/prestacheck.inc.php");

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
    <section class="right">
        <?php    
        foreach ($prestations as $prestation) {
            echo "
                <section class=\"presta\" data-uid=" . $prestation['id-presta'] . ">
                        <ul>
                            <li> <img src='{$prestation['image']}' alt='Image de la prestation'> </li>
                            <div class=\"right\"> <!-- Ajoutez une classe pour la mise en forme à droite -->
                                <h2> Titre: {$prestation['libelet']}</h2>
                                <li> <p><strong>Tarif:</strong> {$prestation['tarif']} </p> </li>
                                <li> <p><strong>Note:</strong> {$prestation['note']} </p> </li>
                                <li> <p><strong>Description:</strong> {$prestation['description']} </p> </li>
                            </div>
                        </ul>
                </section>";
                }
                ?>
    </section>



    </main>
    <?php
    include_once("./template/footer.php");
    ?>

    <script src="./js/click.js"></script>

</body>
</html>
