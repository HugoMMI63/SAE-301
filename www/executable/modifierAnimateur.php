<?php
// On se connecte à la base de données

require("../config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->getMessage();
}

// Récupérer l'ID de l'animateur depuis l'URL

if (isset($_GET['id'])) {
    $id_animateur = $_GET['id'];
    require_once("../classes/Animateur.php");

    // Créez un objet Stage avec l'ID du stage et les autres données du formulaire

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
    // Si l'ID n'existe pas, rediriger vers la page "redirection.php"

    header("Location: redirection.php");
    exit();
}
?>