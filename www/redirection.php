<?php
// On affiche un message lié à la raison de la redirection (si les données sont transmises dans l'URL)

if (isset($_GET["raison"])) {
    switch($_GET["raison"]) {
        case "requete_erreur":
            header("Refresh: 5; URL=admin_stages.php");
            echo("Une erreur est survenue.");
            break;
        case "requete_reussie":
            header("Refresh: 5; URL=admin_stages.php");
            echo("OK.");
            break;
        default:
            header("Refresh: 5; URL=login.php");
            echo("Identifiant et/ou mot de passe incorrect.");
    }
    echo("<br>Redirection en cours...");
}
else {
    header("Location: index.php");  
    exit();
}
?>