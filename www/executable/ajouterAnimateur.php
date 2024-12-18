<?php
require("../config/config.php");
require("../classes/Animateur.php");

$attributs = ["nom", "prenom", "age", "telephone", "description", "photo"];

$animateur = new Animateur(
    null,
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["age"],
    $_POST["telephone"],
    $_POST["description"],
    $_POST["photo"]
);

$animateur->ajouterBDD();
?>