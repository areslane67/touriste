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
        <form action="./src/supression.inc.php" method="post" id="form_supprimer">
        <h2>Supprimer mon compte</h2>
            <!-- Bouton de suppression -->
            <button type="button" id="btn_supprimer">Supprimer mon compte</button>
        </form>

        <!-- Script JavaScript pour soumettre le formulaire lorsque le bouton est cliqué -->
        <script>
            document.getElementById("btn_supprimer").addEventListener("click", function() {
                if(confirm("Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.")) {
                    document.getElementById("form_supprimer").submit();
                }
            });
        </script>
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>