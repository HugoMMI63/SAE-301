<?php
require("../config/config.php");
require("../classes/Reservation.php");

$valide = true;

$attributs = ["nom", "prenom", "age", "telephone", "email", "nom_prenom_RL", "pb_medicaux", "prescriptions", "etat_paiement", "id_stage"];

foreach ($attributs as $attribut) {
    if (isset($_POST[$attribut]) == false) {
        $valide = false;
        break;
    }
}

if ($valide == true) {
    $reservation = new Reservation(
        null,
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["age"],
        $_POST["telephone"],
        $_POST["email"],
        $_POST["nom_prenom_RL"],
        $_POST["pb_medicaux"],
        $_POST["prescriptions"],
        0,
        $_POST["id_stage"]
    );
    
    $reservation->ajouterBDD();
}
else {
    header("Location: ../redirection.php");
    exit();
}
?>