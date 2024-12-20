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
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration - Animateurs</title>
        <script src="js/supprimerAnimateur.js"></script>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <section class="container justify-content-center my-5" id="liste_animateur">
                <h1 class="colorB text-center">Vos animateurs</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <a href="formulaire_ajouter_animateur.php" class="col-12 col-lg-8 d-flex align-items-center justify-content-center border border-2 border-black rounded-4 m-4 mb-4 mt-5 text-center p-4">
                <i class="iconPlus bi bi-plus-circle"></i></a>
                <!-- Boucle pour afficher tous les animateurs -->

                <?php foreach ($animateurs_data as $animateur_data){
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
                <div class="col-12 col-md-8 mb-4 border border-2 border-black rounded-4 p-4">
                    <div class="d-flex justify-content-end gap-1">
                        <button class="suppr col-1" value=<?php echo $animateur->id?>><i class="iconNoir bi bi-x-circle"></i></button>
                        <a href="formulaire_modifier_animateur.php?id=<?php echo $animateur->id ?>"><button class="modif col-1" value=<?php echo $animateur->id?>><i class="iconNoir bi bi-pencil"></i></a>
                    </div>
                    <div class="d-flex gap-4 flex-column flex-lg-row align-items-center align-items-lg-start p-4 animateur-card">
                        <img src="<?php echo $animateur->photo; ?>" alt="Photo de <?php echo $animateur->prenom; ?>" class="rounded-circle me-4 animateur-photo" style="width: 150px; height: 150px; object-fit: cover; flex-shrink: 0;">
                        <div>
                            <h3 class="colorR mb-1 text-center text-lg-start"><?php echo $animateur->prenom." ".$animateur->nom; ?></h3>
                            <p class="text-center text-lg-start mb-2 fst-italic"><?php echo $animateur->age." ans"; ?></p>
                            <p class="text-center text-lg-start mb-2"><?php echo $animateur->telephone; ?></p>
                            <p><?php echo $animateur->description; ?></p>
                        </div>
                    </div>
              </div>
             <?php } ?>
            </section>
        </main>
    </body>
</html>