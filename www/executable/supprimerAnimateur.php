<?php
// Vérifier que l'ID de l'animateur est bien envoyé

if (isset($_GET['id'])) {
    $id_animateur = $_GET['id'];

    // Connexion à la base de données

    require("../config/config.php");

    try {
        $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer une instance de la classe Stage avec l'ID du stage

        require_once("../classes/Animateur.php");

        // Créez un objet Stage en utilisant l'ID

        $animateur = new Animateur($id_animateur, '', '', '', '', '', '', 0, '', 0, 0, 0);

        // Appeler la méthode pour supprimer le stage
        
        $animateur->supprimerBDD();
    }
    catch (PDOException $e) {
        echo 'Échec lors de la connexion : '.$e->getMessage();
    }
}
else {
    header("Location: ../redirection.php");
    exit();
}
?>