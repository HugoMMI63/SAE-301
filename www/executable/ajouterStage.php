<?php
require("../config/config.php");
require("../classes/Stage.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->getMessage();
}

$valide = true;

if ($valide == true) {
    // Création d'un tableau associatif des données du stage
    $tab_valeurs = [
        'id_categorie' => $_POST['id_categorie'],
        'miniature' => $_POST['miniature'],
        'titre' => $_POST['titre'],
        'date' => $_POST['date'],
        'horaire_debut' => $_POST['horaire_debut'],
        'horaire_fin' => $_POST['horaire_fin'],
        'description' => $_POST['description'],
        'nb_places' => $_POST['nb_places'],
        'lieu' => $_POST['lieu'],
        'tarif_min' => $_POST['tarif_min'],
        'tarif_max' => $_POST['tarif_max']
    ];

    // Créer une instance de la classe "Stage" avec l'ID du stage et les autres données du formulaire
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

    // Récupérer les ID des animateurs sélectionnés
    $animateurs_selectionnes = isset($_POST['animateurs']) ? $_POST['animateurs'] : [];


    // Appeler la méthode "modifierBDD" pour modifier le stage dans la base de données
    $stage->ajouterBDD($tab_valeurs, $animateurs_selectionnes);

} else {
    header("Location: ../redirection.php");
    exit();
}
?>
