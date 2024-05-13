<?php
include_once("./src/data.inc.php");
include_once "./src/prestasess.php";
include_once("./src/prestacheck.inc.php");

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
            
            include_once "./src/modifpresta.inc.php";

                // Display the user's prestation
                echo "
                <section class=\"prestavue\" data-uid=" . $user['id-presta'] . "> 
                    <ul>
                        <h2>{$user['libelet']}</h2>
                        <li> <img src='{$user['image']}' alt='Image de la prestation'> </li>
                        <li> <p><strong>Tarif:</strong> {$user['tarif']} </p> </li>
                        <li> <p><strong>Note:</strong> {$user['note']} </p> </li>
                        <li> <p><strong>Description:</strong> {$user['description']} </p> </li>
                    </ul>
                </section>";
            ?>
<section>
        <form method="post" class="mdp">
            <div>
                <label>libelet*</label>
                <input type="text" name="libelet" aria-labelledby="libelet"  id="libelet" placeholder="libelet" aria-required="true" value="<?php echo $user['libelet']; ?>">
            </div>
            <div>
                <label>tarif*</label>
                <input type="text" name="tarif" aria-labelledby="tarif"  id="tarif" placeholder="tarif" aria-required="true" value="<?php echo $user['tarif']; ?>">
            </div>
            <div>
                <label>description*</label>
                <input type="description" name="description" aria-labelledby="description"  id="description" placeholder="description" aria-required="true" autofocus value="<?php echo $user['description']; ?>">
            </div>  
            <div>
                <label>image*</label>
                <input type="url" id="URL" name="image" placeholder="URL" aria-required="true" required value="<?php echo $user['image']; ?>">  
            </div>
            <input class="ok" type="submit" aria-label="Envoyer" value="CREE VOTTR prestation" id="ex">
        </form>   
        <form action="./src/supppresta.inc.php" method="post" id="form_supprimer" class="mdp">
                <h2>Supprimer ma prestation</h2>
                <input type="hidden" name="prestation_id" value="<?php echo $user['id-presta']; ?>">
                <button type="button" id="btn_supprimer">Supprimer ma prestation</button>
            </form>
</section>

    <script src="./js/btnsupp.js"></script>

    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>