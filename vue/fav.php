<?php
include_once "../model/presta.inc.php";
include_once "../model/userfav.inc.php";
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
    <main class="presta">
    <?php
    if (!empty($prestations)) {

    foreach ($prestations as $prestation) {

        $is_favorite = false;
        if (isset($_SESSION['user_id'])) {
            $is_favorite = isFavorite($_SESSION['user_id'], $prestation['id_presta'], $_bdd);
        }
        
        $heart_color = $is_favorite ? "❤️" : "🤍";
        
        echo "
        <section class=\"presta\" data-uid=\"" . $prestation['id_presta'] . "\"> 
            <ul>
                ". (isset($_SESSION['user_id']) ? "
                <form class=\"favorite-form\" method=\"post\" action=\"../model/favorite.inc.php\">
                    <input type=\"hidden\" name=\"id_presta\" value=\"{$prestation['id_presta']}\">
                    <button type=\"submit\" class=\"favorite-button\">{$heart_color}</button>
                </form>
                " : "") . "
                <h2>{$prestation['libelet']}</h2>
                <li><img src=\"{$prestation['photo']}\" alt=\"Image de la prestation\"></li>
                <li><p><strong>Tarif:</strong> {$prestation['tarif']} €</p></li>
                <li><p><strong>Note:</strong> </p></li>
                <li><p><strong>Description:</strong> {$prestation['description']}</p></li>
            </ul>
        </section>
        ";
    }
    ?>
    <?php
} else {
    echo "<p class=\"empty2\">Vous n'avez pas de favoris</p>";
}
?>
    </main>
    <?php
    include_once("../template/footer.php");
    ?>
    <script src="../js/presta.js"></script>
</body>
</html>
