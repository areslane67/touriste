<?php

$user_id = $_GET['id-bob'];
$user = $_bdd->prepare("SELECT * FROM utilisateur WHERE `id` = ?");
$user->execute([$user_id]);
$user = $user->fetch();
?>