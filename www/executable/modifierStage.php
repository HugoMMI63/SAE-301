<?php
include('../config/config.php');
try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->POSTMessage();
}

// Création d'un tableau associatif
$tab_stage = [
    'id_categorie' => $_POST['categorie'],
    'miniature' => $_POST['image'],
    'titre' => $_POST['titre'],
    'date' => $_POST['date'],
    'horaire_debut' => $_POST['horaire_debut'],
    'horaire_fin' => $_POST['horaire_fin'],
    'description' => $_POST['description'],
    'nb_places' => $_POST['nb_place'],
    'lieu' => $_POST['lieu'],
    'tarif_min' => $_POST['prix_min'],
    'tarif_max' => $_POST['prix_max']
];

// Vérification si l'ID du stage est bien envoyé
if (isset($_POST['id'])) {
    $id_stage = $_POST['id'];

    // Connexion à la base de données
    require("../config/config.php");
    require_once("../classes/Stage.php");

    // Créez un objet Stage avec l'ID du stage et les autres données du formulaire
    $stage = new Stage(
        $id_stage, 
        $tab_stage['titre'],
        $tab_stage['miniature'],
        $tab_stage['date'],
        $tab_stage['horaire_debut'],
        $tab_stage['horaire_fin'],
        $tab_stage['nb_places'],
        $tab_stage['lieu'],
        $tab_stage['tarif_min'],
        $tab_stage['tarif_max'],
        $tab_stage['description'],
        $tab_stage['id_categorie']
    );

    $animateurs_selectionnes = isset($_POST['animateurs']) ? $_POST['animateurs'] : [];
    // Appeler la méthode pour modifier le stage dans la base de données
    $stage->modifierBDD($tab_stage,$animateurs_selectionnes);
        
} else {
    echo "Aucun ID de stage fourni.";
}
?>
