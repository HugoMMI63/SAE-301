<?php
require("../config/config.php");
require("../classes/Animateur.php");

$valide = true;

$attributs = ["nom", "prenom", "age", "telephone", "description", "photo"];

foreach ($attributs as $attribut) {
    if (isset($_POST[$attribut]) == false) {
        $valide = false;
        break;
    }
}

if ($valide == true && isset($_GET["id"])) {
    $id_animateur = $_GET["id"];

    $animateur = new Animateur(
        $id_animateur, 
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['age'],
        $_POST['telephone'],
        $_POST['description'],
        $_POST['photo']
    );
    
    // Appeler la méthode pour modifier le stage dans la base de données
        
    $animateur->modifierBDD([
        $animateur->nom,
        $animateur->prenom,
        $animateur->age,
        $animateur->telephone,
        $animateur->description,
        $animateur->photo
    ]);
}
else {
    header("Location: ../redirection.php");
    exit();
}
?>