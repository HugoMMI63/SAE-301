<?php
$hote = "localhost";    // On spécifie les valeurs des différents paramètres nécessaires pour se connecter à la base de données
$port = "3306";

$nom_bdd = "bdd_gestion_stages";

$identifiant = "root";
$mot_de_passe = "";

$dsn='mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd;

$endodage = "utf8";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$endodage);
?>