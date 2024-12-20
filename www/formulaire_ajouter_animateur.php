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
            <section class="container my-5">
                <div class="col-12 d-flex flex-column align-items-center">
                    <a href="admin_animateurs.php"><i class="colorR bi bi-arrow-left-circle" style="font-size: 30px;"></i></a>
                    <h1 class="colorB mt-4">Ajouter un animateur</h1>
                    <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                </div>
                <form class="d-flex flex-column justify-content-center align-items-center" method="POST" action="executable/ajouterAnimateur.php">
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-tag"></i>
                            <label for="nom">Nom :</label>
                        </div>
                        <input class="rounded-4" id="nom" name="nom" type="text" required="required">
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-threads"></i>
                            <label for="prenom">Prénom :</label>
                        </div>
                        <input class="rounded-4" id="prenom" name="prenom" type="text" required="required">
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-calendar-event"></i>
                            <label for="age">Âge :</label>
                        </div>
                        <input class="rounded-4" id="age" name="age" type="number" required="required">
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-telephone"></i>
                            <label for="telephone">Téléphone :</label>
                        </div>
                        <input class="rounded-4" id="telephone" name="telephone" type="text" required="required">
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-card-text"></i>
                            <label for="description">Description :</label>
                        </div>
                        <textarea class="rounded-4" id="description" name="description" required="required"></textarea>
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5">
                        <div>
                            <i class="colorR fs-5 me-3 bi bi-person-bounding-box"></i>
                            <label for="photo">Photo :</label>
                        </div>
                        <input class="rounded-4" id="photo" name="photo" type="url" required="required">
                    </div>
                    <br>
                    <div class="d-flex flex-column col-5 align-items-center">
                        <input class="btn-warning px-4 py-2 mb-4 text-uppercase rounded-4 border border-0 col-6" type="submit" value="Ajouter l'animateur">
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>