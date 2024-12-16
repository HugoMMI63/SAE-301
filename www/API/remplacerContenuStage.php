<?php
// On se connecte à la base de données

require("../config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$donnees = array();

if (isset($_GET["id"])) {
    $donnees["status"] = "OK";
    
    // Requête SQL pour récupérer les informations du stage et des animateurs

    $requete = 'SELECT animateur.prenom, animateur.photo, stage.miniature, stage.titre, stage.date, stage.horaire_debut, stage.horaire_fin, stage.description, stage.nb_places, stage.lieu, stage.tarif_min, stage.tarif_max, stage.id_categorie, categorie.intitule 
               FROM `animateur`, `anime`, `stage`, `categorie` 
               WHERE animateur.id=anime.id_animateur AND anime.id_stage=stage.id AND stage.id_categorie=categorie.id AND stage.id='.$_GET["id"];
    
    $resultats = $dbh->query($requete);

    // Ajouter les données sous "stage"

    $donnees['stage'] = $resultats->fetchAll(PDO::FETCH_ASSOC);
    $resultats->closeCursor();
}
else {
    $donnees["status"] = "Pas d'identifiant";
}

// Encodage en JSON

$donneesJson = json_encode($donnees, JSON_HEX_APOS);

// Remplacer les \\n par des espaces

$donneesJson = str_replace("\\n", " ", $donneesJson);

// On renvoie les données

echo $donneesJson;
?>
