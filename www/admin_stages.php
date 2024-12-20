<?php 
// On se connecte à la base de données

require("config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
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
        <title>Administration - Stages</title>
        <script src="js/supprimerStage.js"></script>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <section id="liste_stage" class="container text-center my-5">
                <h1 class="colorB">Vos stages</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <div class="row justify-content-between">
                    <a href="formulaire_ajouter_stage.php" class="col-12 col-lg-5 d-flex align-items-center justify-content-center border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center p-4">
                        <i class="iconPlus bi bi-plus-circle"></i>
                    </a>
                    <!-- Boucle pour afficher tous les stages -->
                    <?php foreach ($stages_data as $stage_data){

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
                    <div class="col-12 col-lg-5 border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center p-4">
                        <!-- Récupérer icon croix avec bootstrap -->
                        
                        <div class="d-flex justify-content-end gap-1">
                            <button class="suppr col-1" value=<?php echo $stage->id?>><i class="iconNoir bi bi-x-circle"></i></button>
                            <a href="formulaire_modifier_stage.php?id=<?php echo $stage->id ?>"><button class="modif col-1" value=<?php echo $stage->id?>><i class="iconNoir bi bi-pencil"></i></a>
                        </div>
                        <h3 class="colorR my-3"><?php echo $stage->titre; ?></h3>
                        <img class="w-100 rounded-4" src="<?php echo $stage->miniature; ?>" alt="Image du stage" style="width: 300px; height: auto;">
                        <div class="d-flex justify-content-between my-3">
                            <strong><?php echo $stage->date; ?></strong>
                            <?php
                                // Récupérer le nombre de participants pour ce stage
                                $requete = 'SELECT COUNT(*) FROM reservation WHERE id_stage = ' . $stage->id;
                                $resultats = $dbh->query($requete);
        
                                // Utiliser fetchColumn() pour obtenir directement la valeur du comptage
                                $nbparticipant = $resultats->fetchColumn();
        
                                // Calculer les places restantes
                                $places_restantes = $stage->nb_places - $nbparticipant;
                            ?>
                    
                            <strong>Places restantes : <?php echo $places_restantes; ?></strong>
                        </div>
                        <p><?php echo $stage->description; ?></p>
                        <a class="nude" href="admin_details_stage.php?id=<?php echo $stage->id; ?>">
                            <div class="mb-3 ms-3 me-3 mt-auto rounded-pill d-flex align-items-center justify-content-center fondJaune pe-2 ps-2 pt-3 pb-3">
                                <h6 class="mb-0 ms-3">Détails du stage</h6>
                                <i class="iconNoir bi bi-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </main>
    </body>
</html>