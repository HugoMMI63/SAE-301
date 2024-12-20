<?php
// On se connecte à la base de données

require("config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

$resultats = $bdd_gestion_stages->query("SELECT * FROM `categorie`;");
$donnees = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration - Ajouter un animateur</title>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <section class="container text-center my-5">
                <a href="admin_animateurs.php"><i class="colorR bi bi-arrow-left-circle" style="font-size: 30px;"></i></a>
                <h1 class="colorB mt-4">Ajouter un animateur</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <form method="POST" action="executable/ajouterAnimateur.php">
                    <div>
                        <label for="nom">Nom :</label>
                        <input id="nom" name="nom" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="prenom">Prénom :</label>
                        <input id="prenom" name="prenom" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="age">Âge :</label>
                        <input id="age" name="age" type="number" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="telephone">Téléphone :</label>
                        <input id="telephone" name="telephone" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" required="required"></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="photo">Photo :</label>
                        <input id="photo" name="photo" type="url" required="required">
                    </div>
                    <br>
                    <div>
                        <input class="btn btn-warning fw-bold px-4 py-2" type="submit" value="Ajouter l'animateur">
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>