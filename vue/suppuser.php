<?php
include_once("../controller/session.inc.php");
include_once("../controller/data.inc.php");
include_once("../model/userid.inc.php");



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
    <section class="utilisateurs">
    <?php

    if(isset($user) && !empty($user)) {
        echo "<section class=\"user\" data-uid=" . $user['id'] . ">
                <ul>";

        if(isset($user['img']) && !empty($user['img'])) {
            echo '<img src="' . $user['img'] . '" class="up">';
        } else {
            echo '<img src="../assets/1486485581-account-audience-person-customer-profile-user_81164.png" class="up">';
        }

        echo "  
                <li><p><strong>ID: </strong>" . $user['id'] . "</p></li>
                <li><p><strong>Nom: </strong>" . $user['nom'] . " " . $user['prenom'] . "</p></li>
                <li><p><strong>Mail:</strong> " . $user['mail'] . "</p></li>
                <li><p><strong>Adresse:</strong> " . $user['adresse'] . "</p></li>
                <li><p><strong>Ville:</strong> " . $user['ville'] . "</p></li>
                <li><p><strong>Pays:</strong> " . $user['pays'] . "</p></li>
                <li><p><strong>Téléphone:</strong> " . $user['tel'] . "</p></li>
                <li><p><strong>Rôle:</strong> " . $user['role'] . "</p></li>
                <li><p><strong>SIRET:</strong> " . $user['siret'] . "</p></li>
            </ul>
        </section>";

    }

?>
        <form action="../model/suppuser.inc.php" method="get" id="form_supprimer" class="oudini">
            <h2>Supprimer cet utilisateur</h2>
            <input type="hidden" name="id-bob" value="<?php echo $_GET['id-bob']; ?>">
            <input type="hidden" name="action" value="delete">
            <button type="submit" id="btn_supprimer">Supprimer cet utilisateur</button> 
        </form>




    </section>

    </main>
    <?php
    include_once("../template/footer.php");
    ?>

    <script src="../js/user.js"></script>
    <script src="../js/btnsupp.js"></script>


</body>
</html>
