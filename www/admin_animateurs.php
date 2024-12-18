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
        <title>Administrateur - Animateurs</title>
        <script src="js/supprimerAnimateur.js"></script>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <h1>NOS ANIMATEURS</h1>
            <section id="liste_animateur">
                <a href="formulaire_ajouter_animateur.php">Ajouter un animateur</a>
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
                <div>
                    <button class="suppr" value=<?php echo $animateur->id?>>Supprimer</button>
                    <a href="formulaire_modifier_animateur.php?id=<?php echo $animateur->id ?>"><button class="modif" value=<?php echo $animateur->id?>>Modifier</button></a>
                    <img src="<?php echo $animateur->photo; ?>" alt="Photo de <?php echo $animateur->prenom; ?>" style="width: 300px; height: auto;">
                    <h3><?php echo $animateur->prenom." ".$animateur->nom; ?></h3>
                    <p><?php echo $animateur->age." ans"; ?></p>
                    <p><?php echo $animateur->telephone; ?></p>
                    <p><?php echo $animateur->description; ?></p>
                </div>
             <?php } ?>
            </section>
        </main>
    </body>
</html>