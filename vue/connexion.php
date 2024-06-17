<?php
include_once("../controller/data.inc.php");
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
    <main>
        <div class="container">
            <form method="post">
                <h2>connecte toi ici</h2>
                <label>E-mail*</label>
                <input type="email" name="mail" aria-labelledby="email"  id="email" placeholder="Mail Utilisateur" aria-required="true" autofocus>
                <label>Mot de passe*</label>
                <input type="password" name="mdp" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">
                <input class="ok" type="submit" aria-label="Envoyer" value="CONNECTION A VOTRE COMPTE" id="ex">
            </form>
                <?php
                    include_once "../model/connexion.inc.php";
                ?>
            <a class="insc" href="./inscription.php">Vous n'avez pas de compte inscrivez vous ici</a>
        </div>
    </main>
    <?php
    include_once("../template/footer.php");
    ?>
</body>
</html>