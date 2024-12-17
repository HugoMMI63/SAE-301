<?php
// Connexion à la base de données
include("config/config.php");

// connection
try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe,$options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

// Récupérer l'ID du stage depuis l'URL
if (isset($_GET['id'])) {
    $stageId = $_GET['id'];
} else {
    // si l'id n'existe pas rediriger vers index.php
    header("Location: nos_stages.php");
    exit;
}


// Récupérer les détails du stage via l'API
$apiUrl = "http://localhost/www/API/remplacerContenuStage.php?id=" . $stageId;
$response=file_get_contents($apiUrl);
$data=json_decode($response,true);
// Vérifier si les données sont disponibles
if ($data['status'] != 'OK') {
    echo "Stage non trouvé";
    exit;
}
$stage = $data['stage'];

// Récupérer 3 stages aléatoires via l'API
$apiUrl = "http://localhost/www/API/stagesAleatoires.php?id=" . $stageId;
$response=file_get_contents($apiUrl);
$data=json_decode($response,true);
// Vérifier si les données sont disponibles
if ($data['status'] != 'OK') {
    echo "Stage non trouvé";
    exit;
}
$stagesAleatoires = $data['randStage'];


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage - <?php echo $stage[0]['titre']; ?></title>
    <script src="js/afficherDetailsStage.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Ajout de la nav -->
    <main>
    <!-- Informations du stage -->
    <section class="info bg-light p-4 rounded shadow-sm mb-5">
            <h2 class="text-primary text-center mb-4"><?php echo $stage[0]['titre']; ?></h2>
            <img src="Images/barre-sep.png" alt="barre séparation" class="d-block mx-auto my-3">
            <ul class="list-unstyled">
                <li class="mb-2"><strong>Catégorie :</strong> <?php echo $stage[0]['intitule']; ?></li>
                <li class="mb-2"><strong>Période :</strong> <?php echo $stage[0]['date']; ?></li>
                <li class="mb-2"><strong>Lieu :</strong> <?php echo $stage[0]['lieu']; ?></li>
                <li class="mb-2"><strong>Horaires :</strong> De <?php echo $stage[0]['horaire_debut']; ?> à <?php echo $stage[0]['horaire_fin']; ?></li>
                <li class="mb-2"><strong>Nombre de places :</strong> <?php echo $stage[0]['nb_places']; ?></li>
                <li class="mb-2"><strong>Prix :</strong> <?php echo $stage[0]['tarif_min']; ?> à <?php echo $stage[0]['tarif_max']; ?>€ selon le quotient familial</li>
            </ul>
            <img id="miniatureStage" src="<?php echo $stage[0]['miniature']; ?>" alt="Image du stage" class="img-fluid d-block mx-auto my-4">
            <p id="descriptionStage"><strong>Description :</strong> <?php echo $stage[0]['description']; ?></p>
            <div class="text-center">
                <a href="" class="btn btn-yellow px-4 py-2">S'INSCRIRE AU STAGE ></a>
            </div>
        </section>

    <!-- Les animateurs -->
    <section>
            <h2 class="text-center mb-4 h2-custom">LES ANIMATEURS</h2>
            <div id="animateurs" class="row g-3">
                <?php
                $nbAnimateur=count($stage);
                for($i=0; $i<$nbAnimateur; $i++){
                    echo "<div class='col-md-4 text-center'>";
                    echo "<img src=".$stage[$i]['photo']." alt='Photo animateur' class='img-fluid rounded-circle mb-3' style='width: 150px; height: 150px; object-fit: cover;'>";
                    echo "<h3>". $stage[$i]['prenom'] ."</h3>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

    <!-- Affichage de 3 stages aléatoires -->
    <section class="mt-5">
            <h2 class="text-center mb-4 h2-custom">D'AUTRES STAGES</h2>
            <div id="autresStages" class="row g-4">
                <?php
                for ($i=0;$i<3;$i++) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card shadow-sm h-100'>"; 
                    echo "<img src=".$stagesAleatoires[$i]['miniature']." alt='Image du stage' class='card-img-top' style='height: 200px; object-fit: cover;'>"; 
                    echo "<div class='card-body d-flex flex-column'>";
                    echo "<h5 class='card-title'>".$stagesAleatoires[$i]['titre']."</h5>";
                    echo "<p class='text-muted'><small>".$stagesAleatoires[$i]['date']."</small></p>";
                    echo "<p class='card-text flex-grow-1'>".$stagesAleatoires[$i]['description']."</p>";
                    echo "<button class='btn btn-yellow w-100 mt-auto plusInfo' value=".$stagesAleatoires[$i]['id'].">PLUS D'INFO</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    <!-- Bouton pour revenir à la liste des stages -->
    <div class="text-center mt-4">
            <a href="nos_stages.php" class="btn btn-yellow">Retour à la liste des stages</a>
    </div>
    </main>
    <!-- Ajout du footer -->
</body>
</html>
