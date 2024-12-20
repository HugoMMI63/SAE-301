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
        <title>Administration - Ajouter un stage</title>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <section class="container text-center my-5">
                <a href="admin_stages.php"><i class="colorR bi bi-arrow-left-circle" style="font-size: 30px;"></i></a>
                <h1 class="colorB mt-4">Ajouter un stage</h1>
                <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                <form method="POST" action="executable/ajouterStage.php">
                    <div>
                        <label for="miniature">Miniature :</label>
                        <input id="miniature" name="miniature" type="url" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="titre">Titre :</label>
                        <input id="titre" name="titre" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="date">Date :</label>
                        <input id="date" name="date" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="horaire_debut">Horaire (Début) :</label>
                        <input id="horaire_debut" name="horaire_debut" type="time" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="horaire_fin">Horaire (Fin) :</label>
                        <input id="horaire_fin" name="horaire_fin" type="time" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" required="required"></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="nb_places">Nombre de places :</label>
                        <input id="nb_places" name="nb_places" type="number" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="lieu">Lieu :</label>
                        <input id="lieu" name="lieu" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="tarif_min">Tarif (minimum) :</label>
                        <input id="tarif_min" name="tarif_min" type="number" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="tarif_max">Tarif (maximum) :</label>
                        <input id="tarif_max" name="tarif_max" type="number" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="id_categorie">Catégorie :</label>
                        <select id="id_categorie" name="id_categorie" required="required">
                            <?php
                            for ($index = 0; $index < count($donnees); $index = $index + 1) {
                                echo("<option value='".$donnees[$index]["id"]."'>".$donnees[$index]["intitule"]."</option>");
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input class="btn btn-warning fw-bold px-4 py-2" type="submit" value="Ajouter le stage">
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>