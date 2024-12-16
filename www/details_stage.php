<?php
// On se connecte à la base de données

require("config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    
}

// Récupérer l'ID du stage depuis l'URL

if (isset($_GET['id'])) {
    $stageId = $_GET['id'];
}
else {
    // Si l'id n'existe pas, rediriger vers la page "index.php"

    header("Location: index.php");
    exit();
}


// Récupérer les détails du stage via l'API

$apiUrl = "http://localhost/www/API/remplacerContenuStage.php?id=".$stageId;
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// Vérifier si les données sont disponibles

if ($data['status'] != 'OK') {
    echo "Stage non trouvé";
    exit();
}
$stage = $data['stage'];

// Récupérer 3 stages aléatoires via l'API

$apiUrl = "http://localhost/www/API/stagesAleatoires.php?id=".$stageId;
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// Vérifier si les données sont disponibles

if ($data['status'] != 'OK') {
    echo "Stage non trouvé";
    exit();
}
$stagesAleatoires = $data['randStage'];
?>

<?php include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stage - <?php echo $stage[0]['titre']; ?></title>
        <script src="js/afficherDetailsStage.js"></script>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>

        <main>
            <!-- Informations du stage -->

            <section>
                <h1 id='titreStage'><?php echo $stage[0]['titre']; ?></h1>
                <img src="img/barre_separation.png" alt="Barre de séparation">
                <p id='categorieStage'><strong>Catégorie :</strong><?php echo $stage[0]['intitule'] ?></p>
                <p id='periodeStage'><strong>Période :</strong> <?php echo $stage[0]['date']; ?></p>
                <p id='lieuStage'><strong>Lieu :</strong> <?php echo $stage[0]['lieu']; ?></p>
                <p id='horaireStage'><Strong>Horaires :</Strong> De <?php echo $stage[0]['horaire_debut'] ?> à <?php echo $stage[0]['horaire_fin'] ?></p>
                <p id='nbplaceStage'><strong>Nombre de places :</strong> <?php echo $stage[0]['nb_places']; ?></p>
                <p id='tarifStage'><strong>Prix :</strong><?php echo $stage[0]['tarif_min'] ?> à <?php echo $stage[0]['tarif_max'] ?>€ selon le quotient familial</p>
                <img id="miniatureStage" src="<?php echo $stage[0]['miniature']; ?>" alt="Miniature du stage" style="width: 300px; height: auto;">
                <p id="descriptionStage"><strong>Description :</strong> <?php echo $stage[0]['description']; ?></p>
                <a href=""><button id="inscription">S'INSCRIRE AU STAGE ></button></a>
            </section>

            <!-- Les animateurs -->

            <section>
                <h2>LES ANIMATEURS</h2>
                <div id="animateurs">
                    <?php
                    $nb_animateurs = count($stage);
                    for ($i = 0; $i < $nb_animateurs; $i++) {
                    echo "<div>";
                    echo "<img src=".$stage[$i]['photo']." alt='Photo de l'animateur' style='width: 300px; height: auto;'>";
                    echo "<h3>".$stage[$i]['prenom'] ."</h3>";
                    echo "</div>";
                    }
                    ?>
                </div>
            </section>

            <!-- Affichage de 3 stages aléatoires -->

            <section>
                <h2>D'AUTRES STAGES</h2>
                <div id="autresStages">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                    echo "<div>";
                    echo "<h2>".$stagesAleatoires[$i]['titre']."</h2>";
                    echo "<p>".$stagesAleatoires[$i]['date']."</p>";
                    echo "<img src=".$stagesAleatoires[$i]['miniature']." alt='Miniature du stage' style='width: 300px; height: auto;'>";
                    echo "<p>".$stagesAleatoires[$i]['description']."</p>";
                    echo "<button class='plusInfo' value=".$stagesAleatoires[$i]['id'].">PLUS D'INFO</button>";
                    echo "</div>";
                    }
                    ?>
                </div>
            </section>
            <!-- Bouton pour revenir à la page "nos_stages.php" -->
            
            <a href="nos_stages.php"><button>Retour à la liste des stages</button></a>
        </main>
        <!-- Ajout du footer -->

    </body>
</html>