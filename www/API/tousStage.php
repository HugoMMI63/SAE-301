<?php
// Pour se connecter à la base de données
include("../config/config.php");

// Connexion à la base de données
try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$donnees = array();

$donnees["status"] = "OK";
    
// Requête SQL pour récupérer les informations de tout les stages
$requete='SELECT * FROM stage';
$resultats = $dbh->query($requete);
// Ajouter les données sous "randStage"
$donnees['tousStage'] = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


// Encodage en JSON
$donneesJson = json_encode($donnees, JSON_HEX_APOS);

// Remplacer les \\n par des espaces 
$donneesJson = str_replace("\\n", " ", $donneesJson);

// On renvoie les données
echo $donneesJson;
?>
