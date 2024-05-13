<?php
include_once ("./src/session.inc.php");
include_once("./src/data.inc.php");
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

        <form action="./src/supression.inc.php" method="post" id="form_supprimer" class="mdp">
            <h2>Supprimer mon compte</h2>
            <button type="button" id="btn_supprimer">Supprimer mon compte</button>
        </form>

    <script src="./js/btnsupp.js"></script>

        
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>