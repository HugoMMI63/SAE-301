<?php
// On se connecte à la base de données

require("config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

$resultats = $bdd_gestion_stages->query("SELECT * FROM `categorie`;");
$categories = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$resultats = $bdd_gestion_stages->query("SELECT id, titre, id_categorie FROM `stage`;");
$stages = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ka'fête ô mômes - Inscription à un stage</title>
        <script src="js/selectStagesDynamique.js"></script>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>
        <main>
            <h1>S'inscrire à un stage</h1>
            <form method="POST" action="executable/ajouterReservation.php">
                <fieldset>
                    <legend>Responsable légal</legend>
                    <div>
                        <label for="nom_prenom_RL">Nom et prénom :</label>
                        <input id="nom_prenom_RL" name="nom_prenom_RL" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="email">Adresse e-mail :</label>
                        <input id="email" name="email" type="email" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="telephone">Numéro de téléphone :</label>
                        <input id="telephone" name="telephone" type="text" required="required">
                    </div>
                    <br>
                    <div>
                        <label for="salaire_foyer">Salaire annuel du foyer (Net) :</label>
                        <input id="salaire_foyer" name="salaire_foyer" type="number" required="required">
                    </div>
                    <br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Enfant</legend>
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
                        <label for="pb_medicaux">Problèmes médicaux :</label>
                        <textarea id="pb_medicaux" name="pb_medicaux" required="required"></textarea>
                    </div>
                    <div>
                        <label for="prescriptions">Prescriptions :</label>
                        <textarea id="prescriptions" name="prescriptions" required="required"></textarea>
                    </div>
                    <br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Stage</legend>
                    <div>
                        <label for="id_categorie">Catégorie :</label>
                        <select id="id_categorie" name="id_categorie" required="required">
                            <?php
                            for ($index = 0; $index < count($categories); $index = $index + 1) {
                                echo("<option value='".$categories[$index]["id"]."'>".$categories[$index]["intitule"]."</option>");
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="id_stage">Intitulé du stage :</label>
                        <select id="id_stage" name="id_stage" required="required">
                            <?php
                            for ($index = 0; $index < count($stages); $index = $index + 1) {
                                if ($stages[$index]["id_categorie"] == 1) {
                                    echo("<option class='stages_ados' value='".$stages[$index]["id"]."'>".$stages[$index]["titre"]."</option>");
                                }
                                elseif ($stages[$index]["id_categorie"] == 2) {
                                    echo("<option class='stages_petits d-none' value='".$stages[$index]["id"]."'>".$stages[$index]["titre"]."</option>");
                                }
                                else {
                                    echo("<option value='".$stages[$index]["id"]."'>".$stages[$index]["titre"]."</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                </fieldset>
                <br>
                <div>
                    <input id="checkbox" name="checkbox" type="checkbox" required="required">
                    <label for="checkbox">En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre de la gestion des stages de notre association.</label>
                </div>
                <br>
                <div>
                    <input type="submit" value="S'inscrire au stage">
                </div>
            </form>
        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>