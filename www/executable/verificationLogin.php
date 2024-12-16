<?php
// On se connecte à la base de données

require("../config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

$resultats = $bdd_gestion_stages->query("SELECT * FROM `administrateur`;");
$donnees = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$login = $_POST["login"];
$mdp = $_POST["mdp"];

if ($login == $donnees["login"] && $mdp == $donnees["mdp"]) {
    header("Location: ../stagesAdmin.php");  
    exit();
}
else {
    header("Location: ../redirection.php?raison=login_erreur");
    exit();
}
?>