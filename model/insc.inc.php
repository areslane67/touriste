<?php
    include_once("./src/data.inc.php");

    function check_existing_email($email, $bdd) {
        $query = $bdd->prepare("SELECT COUNT(*) FROM utilisateur WHERE mail = ?");
        $query->execute([$email]);
        $count = $query->fetchColumn();
        return $count > 0;
    }

    function send_data($img, $nom, $prenom, $mail, $adresse, $mdp, $ville, $pays, $tel, $role, $siret, $_bdd){
        $req = $_bdd->prepare('INSERT INTO utilisateur (img, nom, prenom, mail, adresse, mdp, Ville, Pays, tel, role, siret)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $req->execute(array($img, $nom, $prenom, $mail, $adresse, $mdp, $ville, $pays, $tel, $role, $siret));
    }
?>
