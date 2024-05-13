<?php 
include_once ("./src/session.inc.php");
include_once ("./src/mdp.inc.php");

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

    <form method="post">
    <h2>Modification du mot de passe</h2>
        <label for="old_password">Ancien mot de passe :</label><br>
        <input type="password" id="old_password" name="old_password"><br><br>
        <label for="new_password">Nouveau mot de passe :</label><br>
        <input type="password" id="new_password" name="new_password">
        <label for="confirm_password">Confirmer le nouveau mot de passe :</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <?php if (!empty($new_password_err)) { echo "<br><span class='error'>$new_password_err</span>"; } ?><br>
        <?php if (!empty($confirm_password_err)) { echo "<br><span class='error'>$confirm_password_err</span>"; } ?><br>
        <input class="ok" type="submit" value="Modifier le mot de passe">
    </form>
    </main>
<?php
    include_once("./template/footer.php");
    ?>
</body>
</html>