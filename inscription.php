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
    <main>    
            <div class="container">
                <div class="content-2 ">
                    <form method="post" class="login">
                        <label>role*</label>
                        <select name="role" id="role">
                            <option value="Client">Client</option>
                            <option value="prestataire">prestataire</option>
                            <option value="admin">admin</option>
                        </select>
                        <label>Photo</label>
                        <input type="url" name="img" aria-labelledby="URL"  id="img" placeholder="img">
                        <label>Nom*</label>
                        <input type="text" name="nom" aria-labelledby="Nom"  id="Nom" placeholder="nom" aria-required="true">
                        <label>Prénom*</label>
                        <input type="text" name="prenom" aria-labelledby="Prénom"  id="Prénom" placeholder="prenom" aria-required="true">
                        <label>E-mail*</label>
                        <input type="email" name="mail" aria-labelledby="email"  id="email" placeholder="Mail Utilisateur" aria-required="true" autofocus>
                        <label>adresse*</label>
                        <input type="adresse" name="adresse" aria-labelledby="adresse"  id="adresse" placeholder="adresse" aria-required="true" autofocus>
                        <label>Ville*</label>
                        <input type="text" id="Ville" name="Ville" placeholder="Ville" required>
                        <label>Pays*</label>
                        <input type="text" id="Pays" name="Pays" placeholder="Pays" required>
                        <label>tel*</label>
                        <input type="tel" name="tel" aria-labelledby="tel" id="tel" placeholder="tel" aria-required="true">
                        <label id="labelSiret">Siret*</label>
                        <input type="text" name="siret" aria-labelledby="siret" id="siret" placeholder="siret">
                        <label>Mot de passe*</label>
                        <input type="password" name="mdp" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">
                        <label>Mot de passe confirme*</label>
                        <input type="password" name="mdpC" aria-labelledby="password" id="passwordc" placeholder="Mot de passe" aria-required="true">
                        <input class="ok" type="submit" aria-label="Envoyer" value="CONNECTION A VOTRE COMPTE" id="ex">
                    </form>   
                        <?php
                        include_once "./src/inscription.inc.php";
                        ?>
                 </div>
            </div>
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>