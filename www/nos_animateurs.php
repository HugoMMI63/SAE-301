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

$api = "http://localhost/www/API/tousAnimateur.php";
$response = file_get_contents($api);
$donnees = json_decode($response, true);

// Vérifier que l'API a retourné un statut "OK"

if ($donnees["status"] == "OK" ) {
    $animateurs_data = $donnees['tousAnimateur']; 
    require_once("classes/Animateur.php"); 

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
        <title>Ka'fête ô mômes - Nos animateurs</title>
        <meta name="description" content="L'équipe de la Ka'fête ô mômes est composée de personnes passionées, toutes avec un objectif commun : accompagner le développement personnel de vos enfants !">
        <meta name="keywords" content="Ka'fête ô mômes, association, enfants, parents, familles, équipe, animateurs, passion, Lyon">
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>
        <main>
            <section class="container text-center my-5">
                <h1 class="colorB">Nos animateurs</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <div class="row justify-content-center">
                    <!-- Boucle pour afficher tous les animateurs -->

                    <?php foreach ($animateurs_data as $animateur_data) {
                        // Créer un objet Animateur pour chaque Animateur

                        $animateur = new Animateur(
                            $animateur_data["id"],
                            $animateur_data["nom"],
                            $animateur_data["prenom"],
                            $animateur_data["age"],
                            $animateur_data["telephone"],
                            $animateur_data["description"],
                            $animateur_data["photo"]
                        );
                    ?>
                    <!-- Affichage de chaque animateur -->

                    <div class="col-12 col-lg-9 mb-4">
                        <div class="d-flex gap-4 flex-column flex-lg-row align-items-center align-items-lg-start p-4 animateur-card">
                            <img src="<?php echo $animateur->photo; ?>" alt="Photo de <?php echo $animateur->prenom; ?>" class="rounded-circle animateur-photo" style="width: 150px; height: 150px; object-fit: cover; flex-shrink: 0;">
                            <div>
                                <h3 class="colorR mb-1 text-center text-lg-start">
                                    <?php echo $animateur->prenom; ?>
                                </h3>
                                <p class="text-center text-lg-start mb-2 fst-italic">
                                    <?php echo $animateur->age; ?> ans
                                </p>
                                <p>
                                    <?php echo $animateur->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>