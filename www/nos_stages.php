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

$api = "http://localhost/SAE-301-paulineorus-main1/SAE-301-paulineorus-main/www/API/tousStage.php";
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

include("ressources/ressourcesCommunes.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
        <title>Nos stages</title>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>

        <main>
    <h1>NOS STAGES</h1>
    <section>
        <!-- Boucle pour afficher tous les stages -->
        <section class="container container-stages">
        <div class="row">
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
          <div class="col-md-6 mb-4">
             <div class="card-stage">
                <h3><?php echo $stage->titre; ?></h3>
                <img src="<?php echo $stage->miniature; ?>" alt="Image du stage" style="width: 300px; height: auto;">
                <div class="info">
                <p>Date : <?php echo $stage->date; ?></p>
                <p>Places restantes : <?php echo $stage->nb_places; ?></p>
                </div>
                <p><?php echo $stage->description; ?></p>
                <a href="details_stage.php?id=<?php echo $stage->id; ?>"><button>Voir plus</button></a>
              </div>
         </div>
        <?php endforeach; ?>
    </section>
  </main>
    <!-- Ajout du footer -->

    </body>
</html>