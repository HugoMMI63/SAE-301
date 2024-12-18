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

include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrateur - Stages</title>
        <script src="js/supprimerStage.js"></script>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
        <h1>NOS STAGES</h1>
            <section id="liste_stage">
                <a href="formulaire_ajouter_stage.php">Ajouter un stage</a>
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
                <div>
                    <!-- Récupérer icon croix avec bootstrap -->
                    <button class="suppr" value=<?php echo $stage->id?>>Supprimer</button>
                    <a href="formulaire_modifier_stage.php?id=<?php echo $stage->id ?>"><button class="modif" value=<?php echo $stage->id?>>Modifier</button></a>
                    <h3><?php echo $stage->titre; ?></h3>
                    <img src="<?php echo $stage->miniature; ?>" alt="Image du stage" style="width: 300px; height: auto;">
                    <p><?php echo $stage->description; ?></p>
                    <p>Date : <?php echo $stage->date; ?></p>
                    <p>Places restantes : <?php echo $stage->nb_places; ?></p>
                    <a href="details_stage.php?id=<?php echo $stage->id; ?>"><button>Voir détails</button></a>
                </div>
                <?php } ?>
            </section>
        </main>
    </body>
</html>