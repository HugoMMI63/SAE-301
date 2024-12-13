<?php
//header("Refresh: 5; URL=connexion.html");

// On affiche un message lié à la raison de la redirection

switch($_GET["raison"]) {
    case "requete_erreur":
        echo("Une erreur est survenue.");
        break;
    case "requete_reussie":
        echo("OK.");
        break;
    default:
        echo("Identifiant et/ou mot de passe incorrect.");
}
echo("<br>Redirection en cours...");
?>