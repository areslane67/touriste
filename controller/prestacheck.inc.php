<?php

if(isset($_SESSION['role']) && $_SESSION['role'] != 'prestataire') {
    session_destroy();
    header("Location: ./index.php");
    exit;
}
?>
