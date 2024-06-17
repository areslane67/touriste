<?php

include_once "../model/panier.inc.php";

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
if (!empty($prestations)) {
    ?>
        <section class="leftinfo">
            <p><strong>Vous avez : </strong><?php echo $tarif_count_result['pres']; ?> prestation dans le panier</p>
            <p><strong>Prix Total : </strong><?php echo $tarif_count_result['tarif_count']; ?>€</p>
        </section>
    <section class="right">
        <?php    
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
                        ". (isset($_SESSION['user_id']) ? "
                            <form class=\"zouzou\" method=\"post\" action=\"../model/supppanier.inc.php\">
                                <input type=\"hidden\" name=\"id_presta\" value=\"{$prestation['id_presta']}\">
                                <button type=\"submit\" class=\"favorite-button\">delete</button>
                            </form>
                        " : "") . "
                </section>";
        }
        ?>
    </section>
<?php
} else {
    echo "<p class=\"empty\">Votre panier est vide.</p>";
}
?>





    </main>
    <?php
    include_once("../template/footer.php");
    ?>
</body>
</html>
