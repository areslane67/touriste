<?php
include_once ("./src/session.inc.php");
include_once("./src/data.inc.php");
include_once("./src/addpresta.inc.php");
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
        <form method="post" class="login">
                        <label>libelet*</label>
                        <input type="text" name="libelet" aria-labelledby="libelet"  id="libelet" placeholder="libelet" aria-required="true">
                        <label>tarif*</label>
                        <input type="text" name="tarif" aria-labelledby="tarif"  id="tarif" placeholder="tarif" aria-required="true">
                        <label>description*</label>
                        <input type="description" name="description" aria-labelledby="description"  id="description" placeholder="description" aria-required="true" autofocus>
                        <label>image*</label>
                        <input type="url" id="URL" name="image" placeholder="URL" aria-required="true" required>
                        <input class="ok" type="submit" aria-label="Envoyer" value="CREE VOTTR prestation" id="ex">
                    </form>   
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>