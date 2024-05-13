<?php
include_once ("./src/session.inc.php");
include_once("./src/data.inc.php");
include_once("./src/update.php");
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

        <h2>Infos de compte</h2>

    <div class="principal">
        <div>
            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" value="<?php echo $_SESSION['mail']; ?>">
        </div>
    </div>

        <h2>Informations personnelles</h2>

    <div class="principal">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom']; ?>">
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">   
        </div>
        <div>
            <label for="tel">Téléphone:</label>
            <input type="tel" id="tel" name="tel" value="<?php echo $_SESSION['tel']; ?>">       
        </div>
    </div>

        <h2>Adresse</h2>

    <div class="principal">   
        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $_SESSION['adresse']; ?>">
        </div> 
        <div>
            <label for="Ville">Ville:</label>
            <input type="text" id="Ville" name="Ville" value="<?php echo $_SESSION['Ville']; ?>">
        </div>
        <div>
            <label for="Pays">Pays:</label>
            <input type="text" id="Pays" name="Pays" value="<?php echo $_SESSION['Pays']; ?>">
        </div>
    </div>

        <input class="ok" type="submit" name="update" value="Mettre à jour">
        
    </form>
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>