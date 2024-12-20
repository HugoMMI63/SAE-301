<?php
// On se connecte à la base de données

require("config/config.php");
$bdd_gestion_stages = new PDO($dsn, $identifiant, $mot_de_passe, $options);

$resultats = $bdd_gestion_stages->query("SELECT * FROM `categorie`;");
$categories = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$resultats = $bdd_gestion_stages->query("SELECT id, nb_places, titre, id_categorie FROM `stage`;");
$stages = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

$resultats = $bdd_gestion_stages->query("SELECT `id_stage`, COUNT('id') as reservation FROM `reservation` GROUP BY id_stage;");
$nb_resa = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();
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
        <main class="my-5 container">
            <h1 class="text-center colorB">S'inscrire à un stage</h1>
            <img class="mx-auto d-block my-4" src="img/barre_separation.png" alt="barre de séparation" style="max-width: 150px;">
            <form class="mx-auto m-5 " method="POST" action="executable/ajouterReservation.php" style="width: 40%;">
                <fieldset>
                    <legend>Responsable légal</legend>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-arms-up colorR me-2" viewBox="0 0 16 16">
                    <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                    <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                    </svg>
                        <label for="nom_prenom_RL"><h5>Nom et prénom :</h5></label><br>
                        <input class="rounded" id="nom_prenom_RL" name="nom_prenom_RL" type="text" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at colorR me-2" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                    <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                    </svg>
                        <label for="email"><h5>Adresse e-mail :</h5></label><br>
                        <input class="rounded" id="email" name="email" type="email" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill colorR me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>
                        <label for="telephone"><h5>Numéro de téléphone :</h5></label><br>
                        <input class="rounded" id="telephone" name="telephone" type="text" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill colorR me-2" viewBox="0 0 16 16">
                    <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223"/>
                    <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                    <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                    <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                    </svg>
                        <label for="salaire_foyer"><h5>Salaire annuel du foyer (Net) :</h5></label><br>
                        <input class="rounded" id="salaire_foyer" name="salaire_foyer" type="number" required="required">
                    </div>
                    <br>
                </fieldset>
                <br>
                <fieldset class="mt-5">
                    <legend>Enfant</legend>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill colorR me-2" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                        <label for="nom"><h5>Nom :</h5></label><br>
                        <input class="rounded" id="nom" name="nom" type="text" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff colorR me-2" viewBox="0 0 16 16">
                    <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362s.96-1.932.362-2.531c-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532"/>
                    <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9 9 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a10 10 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093q.1.026.16.045c.184.06.279.13.351.295l.029.073a3.5 3.5 0 0 1 .157.721c.055.485.051 1.178-.159 2.065m-4.828 7.475.04-.04-.107 1.081a1.54 1.54 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a9 9 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006M5.205 5c-.625.626-.94 1.351-1.004 2.09a9 9 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a3 3 0 0 0-.045-.283 3 3 0 0 0-.3-.041Z"/>
                    <path d="M7.009 12.139a7.6 7.6 0 0 1-1.804-1.352A7.6 7.6 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
                    </svg>
                        <label for="prenom"><h5>Prénom :</h5></label><br>
                        <input class="rounded" id="prenom" name="prenom" type="text" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diamond-fill colorR me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098z"/>
                    </svg>
                        <label for="age"><h5>Âge :</h5></label><br>
                        <input class="rounded" id="age" name="age" type="number" min="3" max="11" required="required">
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-radios colorR me-2" viewBox="0 0 16 16">
                    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0m7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5M3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6m0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                    </svg>
                        <label for="pb_medicaux"><h5>Problèmes médicaux :</h5></label><br>
                        <textarea class="rounded" id="pb_medicaux" name="pb_medicaux" required="required"></textarea>
                    </div>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-left colorR me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                    </svg>
                        <label for="prescriptions"><h5>Prescriptions :</h5></label><br>
                        <textarea class="rounded" id="prescriptions" name="prescriptions" required="required"></textarea>
                    </div>
                    <br>
                </fieldset>
                <br>
                <fieldset class="mt-5">
                    <legend>Stage</legend>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-fill colorR me-2" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z"/>
                    </svg>
                        <label for="id_categorie"><h5>Catégorie :</h5></label><br>
                        <select class="rounded" id="id_categorie" name="id_categorie" required="required">
                            <?php
                            for ($index = 0; $index < count($categories); $index = $index + 1) {
                                echo("<option value='".$categories[$index]["id"]."'>".$categories[$index]["intitule"]."</option>");
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-circle colorR me-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                        <label for="id_stage"><h5>Intitulé du stage :</h5></label><br>
                        <select class="rounded" id="id_stage" name="id_stage" required="required">
                        <?php
                            for ($index = 0; $index < count($stages); $index++) {
                                // Récupère le nombre de réservations pour le stage actuel
                                $reservation_count = 0;  
                                
                                // Cherche les réservations pour ce stage
                                foreach ($nb_resa as $reservation) {
                                    if ($reservation["id_stage"] == $stages[$index]["id"]) {
                                        $reservation_count = $reservation["reservation"];  
                                        break;  
                                    }
                                }
                                
                                // Calcule le nombre de places restantes
                                $places_restantes = $stages[$index]["nb_places"] - $reservation_count;
                                
                                // Si des places sont disponibles, on affiche le stage disabled
                                if ($places_restantes > 0) {
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
                    <input class="btn-warning" type="submit" value="S'inscrire au stage">
                </div>
            </form>
        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>
