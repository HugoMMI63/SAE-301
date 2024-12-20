<?php 
// On se connecte à la base de données

require("config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->getMessage();
}

// Appel de l'API pour récupérer les stages

$api = "http://localhost/www/API/tousStage.php";
$response = file_get_contents($api);
$donnees = json_decode($response, true);

// Vérifier que l'API a retourné un statut "OK"

if ($donnees["status"] == "OK" ) {
    $stages_data = $donnees['tousStage'];
    require_once("classes/Stage.php");

}
else {
    echo "Erreur lors de la récupération des données.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ka'fête ô mômes - Nos stages</title>
        <meta name="description" content="La Ka'fête ô mômes organise des stages de vacances scolaires diversifiés pendant toute l'année !">
        <meta name="keywords" content="Ka'fête ô mômes, association, stages, vacances scolaires, vacances, activités, enfants, parents, familles, Lyon">
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>
        <main>
            <section class="container text-center my-5">
                <h1 class="colorB">Nos stages</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <div class="row justify-content-center justify-content-lg-between">
                    <!-- Boucle pour afficher tous les stages -->

                    <?php foreach ($stages_data as $stage_data): 
                        // Créer un objet Stage pour chaque stage
                        
                        $stage = new Stage(
                            $stage_data["id"],
                            $stage_data["miniature"],
                            $stage_data["titre"],
                            $stage_data["date"],
                            $stage_data["horaire_debut"],
                            $stage_data["horaire_fin"],
                            $stage_data["description"],
                            $stage_data["nb_places"],
                            $stage_data["lieu"],
                            $stage_data["tarif_min"],
                            $stage_data["tarif_max"],
                            $stage_data["id_categorie"]
                        );
                    ?>
                    <div class="col-12 col-lg-5 border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center">
                        <h3 class="colorR my-3"><?php echo $stage->titre; ?></h3>
                        <img class="w-100 rounded-4" src="<?php echo $stage->miniature; ?>" alt="Image du stage" style=" height: auto;">
                        <div class="d-flex justify-content-between my-3">
                            <strong><?php echo $stage->date; ?></strong>
                            <?php
                                // Récupérer le nombre de participants pour ce stage

                                $requete = 'SELECT COUNT(*) FROM reservation WHERE id_stage = '.$stage->id;
                                $resultats = $dbh->query($requete);
        
                                // Utiliser fetchColumn() pour obtenir directement la valeur du comptage

                                $nbparticipant = $resultats->fetchColumn();
        
                                // Calculer les places restantes

                                $places_restantes = $stage->nb_places - $nbparticipant;
                            ?>
                            <strong>Places restantes : <?php echo $places_restantes; ?></strong>
                        </div>
                        <p><?php echo $stage->description; ?></p>
                        <?php if ($places_restantes > 0) {
                            echo "<a href='details_stage.php?id=".$stage->id."''><button class='btn-warning fw-bold px-4 py-2 mb-4 text-uppercase'>Découvrir ce stage ></button></a>";
                            } else { 
                            echo "<p>Ce stage est complet.</p>";
                        }?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>