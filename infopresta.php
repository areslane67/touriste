<?php
include_once "./src/prestasess.php";
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
                <section class=\"infopresta\" data-uid=" . $user['id-presta'] . "> 

                    <ul>
                        <div>
                            <li> <img src='{$user['image']}' alt='Image de la prestation'> </li>
                        </div>
                        <div class=\"infopresta\">
                            <h2><strong>{$user['libelet']}</strong></h2>
                            <li> <h2>Tarif:{$user['tarif']} €</h2> </li>
                            <li> <p><strong>Note:</strong> {$user['note']} </p> </li>
                            <li> <p><strong>Description:</strong> {$user['description']} </p> </li>
                        </div>
                    </ul>

                </section>";
            ?>
    </main>
    <?php
    include_once("./template/footer.php");
    ?>
</body>
</html>