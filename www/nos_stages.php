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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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
        <title>Nos stages</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>

        <main>
            <h1 class="text-center mb-4 h2-custom">NOS STAGES</h1>
            <img src="img/barre_separation.png" alt="Barre de séparation" class="d-block mx-auto my-3">
            <section class="stage-container container py-4">
                <div class="row row-cols-1 row-cols-md-2 g-3">
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
                <div class="col">
                    <div class="stage-card card">
                        <img src="<?php echo $stage->miniature; ?>" alt="Image du stage" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $stage->titre; ?></h5>
                            <p class="card-text"><?php echo $stage->description; ?></p>
                            <p>Date : <?php echo $stage->date; ?></p>
                            <p>Places restantes : <?php echo $stage->nb_places; ?></p>
                            <a href="details_stage.php?id=<?php echo $stage->id; ?>" class="btn-yellow">Voir plus</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </main>
        <footer>
            <?php include("navbars/footer.php"); ?>
        </footer>
    </body>
</html>

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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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

$api = "http://localhost/MMI2/SAE301V3/sae/www/API/tousStage.php";
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
