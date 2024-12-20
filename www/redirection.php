<?php
// On affiche un message lié à la raison de la redirection (si les données sont transmises dans l'URL)

if (isset($_GET["raison"]) && isset($_GET["contexte"]) && isset($_GET["action"])) {
    $message = "";

    switch($_GET["raison"]) {
        case "requete_reussie":
            switch($_GET["contexte"]) {
                case "stages":
                    header("Refresh: 3; URL=admin_stages.php");
                    switch($_GET["action"]) {
                        // Ajouter un stage (réussi)

                        case "ajouter":
                            $message = "Stage ajouté avec succès.";
                            break;

                        // Modifier un stage (réussi)

                        default:
                            $message = "Stage modifié avec succès.";
                            break;
                    }
                    break;
                case "animateurs":
                    header("Refresh: 3; URL=admin_animateurs.php");
                    switch($_GET["action"]) {
                        // Ajouter un animateur (réussi)

                        case "ajouter":
                            $message = "Animateur ajouté avec succès.";
                            break;

                        // Modifier un animateur (réussi)

                        default:
                            $message = "Animateur modifié avec succès.";
                            break;
                    }
                    break;

                // Réaliser une réservation (réussi)

                default:
                    header("Refresh: 3; URL=formulaire_inscription.php");
                    $message = "Réservation envoyée avec succès.";
                    break;
            }
            break;

        // Requête ne pouvant pas aboutir

        case "requete_erreur":
            header("Refresh: 3; URL=login.php");
            $message = "Une erreur est survenue.";
            break;
        
        // Identifiants de connexion non valides

        default:
            header("Refresh: 3; URL=login.php");
            $message = "Identifiant et/ou mot de passe incorrect.";
    }
}
else {
    header("Location: index.php");  
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redirection en cours</title>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <main class="d-flex flex-column vh-100 justify-content-center">
            <div class="container text-center my-5">
                <h1 class="colorB">Redirection en cours...</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <p class="mt-4"><?php echo($message); ?></p>
            </div>
        </main>
    </body>
</html>