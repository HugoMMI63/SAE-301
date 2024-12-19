<?php
// On se connecte à la base de données
require("config/config.php");

try {
    $dbh = new PDO($dsn, $identifiant, $mot_de_passe, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->getMessage();
}

// Récupérer l'ID du stage depuis l'URL
if (isset($_GET['id'])) {
    $stageId = $_GET['id'];
}
else {
    // Si l'ID n'existe pas, rediriger vers la page "index.php"
    header("Location: admin_stages.php");
    exit();
}


// Récupérer les détails du stage via l'API
$apiUrl = "http://localhost/www/API/remplacerContenuStage.php?id=".$stageId;
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// Vérifier si les données sont disponibles
if ($data['status'] != 'OK') {
    echo "Stage non trouvé";
    exit();
}
$stage = $data['stage'];

$requete='SELECT * FROM `reservation` WHERE id_stage='.$stageId;
$res=$dbh->query($requete);
$reservations=$res->fetchALL(PDO::FETCH_ASSOC);
$res->closeCursor();

include("ressources/ressourcesCommunes.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stage - <?php echo $stage[0]['titre']; ?></title>
        <script src='js/adminChangerStage.js'></script>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <div>
                <button id="stage" value="<?php echo $stage[0]['id'] ?>">Le stage</button>
                <button id="participants" value="<?php echo $stage[0]['id'] ?>">Les participants</button>
            </div>
            <div id="stageInfo">
                <div class="d-flex justify-content-end">
                    <a href="formulaire_modifier_stage.php?id=<?php echo $stage[0]['id']; ?>"><button class="modif col-1 nude" value=<?php echo $stage[0]['id'];?>><img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAFP0lEQVR4nO2da4xdUxTHfzpt6dzxFtQrqYZMJkQIKUKIikSpUK3SD8IHEh9IVEoiSEPEIAgR8QyJFBEN0noURQmCCj6IpAlB69HHMN6G1pGd7MbN5M7ctc7Z57H3rF+yPt4ze//X3Y+z/+vuAcMwDMMwDMMwjInBJGAhsBzYAPwNbATWAFcBu9TdwJQ5BPgYyMaJzcC5dTc0RY4Dfuwi/vb4F1hSd4NT4kTgF6H47XFd3Q1PgZOBX3OIb0kIwOnAnwXEtyQU4EzgrwDiWxJysNBvL0OJb0lQsAj4RyjoT8BpwHuWhDBcAmwTijkEHO0/1wLetCQU4zK/f5eI/wNw+KjPuyS8YUnIxxLFPP4dMDDGcywJObhGIf5XwMwuz3NJeN1GgowbFUJ9CcwQPrcXWG1JGJsdgDsVAn0O7I8OS8I44t+jEP8zYDr5cEl4zUbC//QAjyoEWQvsSTG0I+FqEmUy8IRCiHeB3QL9bZeEV4V/122F55MYU4FnFOK/VYKztSOwQvj3N6fkrO2k6Hjmv6nuG1sG04CXhe1w9mb09AKvKMRf6RNWJu75Lwna4jzmqGkpdyAr/DRR1ZT4fJf2bCJidgXeUYj/pF+kq3baxjt7cl5ElOwBfKgQ/zG/Pa2SkwQe89dEyN7AJwrxH/R1Pk30mJ8iMqb7t1ap+Hf7t+IqOUPhMc8jIg4E1inEv7WGNp4DjAjb90ENX47czPAnlVLxH6mhjecrbM4hwZF3YzgUWK8Q38UwcGyDPeZZREI/8K1S/KqTkNdjbjwDwPc5xa8qCUU95sZyFLCloPhlJyGUx9w4jvFDNQsYoZMQ2mOOskh2xFcmDyuSEGLxu0Uh/jq/fU5S/LPbpquhCkZCFR5zbcxRvD3+7ksF2yk7CVV6zJUzV1Gh/Bswe4znlJWEHv9iJxX/I2AvImG+4gVmGDi+y/NmBV4T3PH1MqXH7I7Jo2CS3yFoTjUlhEqC1mN2hbs7ExFzFJ3LfAwKn110OnLiP6tolyvY7SMyutl1WU1JcB7zKkV7XvRGfFQcoJj7sw6xtKTpaLay/Hy5Hy3RsbSA+FmJI0ETzs2aQoT0eC80izgJy2ow+INxlvDkMKtxOhov7q/BYw7KC1066I4j9lHOxYMVjYT7YrIRO3EQsLVLJx/K+VOgwZKTcBsJcJOgo+7CjO30AW+XMB2dpxRf+txGM1lgL7oTxNG0Ao8ErcF/PYkwT9DZxWN8thUoCf3+AibJM5zVeCUJsUpwxu+q3igpCQPeGpSKfzkJcbCgcsAdfHWjlTMJGo/ZbRIuJjEkNp47nJPQp1yYH1bs/93xyAUkxlTBi9UGZfVySzkSJDGS6j1wki2f255qaQVMQrvHnByrBQte3rKNVoAkdPKYk2GmoHLMJagIrQJJcB7zKSTM7QIRXGFrHqYAJwA3AO/nEH941Fs3KS6+mwQi9Cq3s5cCTxc82YyqQjkviwRC3KsQfEugBdddQXwEE4A1AjGOHPWZfYEFwAPKiolMGG47fBgTgH7B4vupL2Ca699Y15YgeNYW3/h7oScEdwl3INLa+qxgaC5iip5pJZngWY74GXgupgrlqhbfsuIPf3XBtb7OJ1rjvAiPVyj4Vr92uDXk1Aou4YiCUCUnWYfY5v+5wh3+B9FR1WJWhfQfIEjjC78tvRDYr+7OxcDGmhferOFROtLboiZqlM7iBnQya3CUjrMMbRqivgQ4LmrANy1raFTGzQ3obNbAqJQF/uy97k5nDYrK2R24wv+Ibb3iZpEs0TAMwzAMwzAMwzAMwzAMOvEfHShJhKcuKygAAAAASUVORK5CYII=" alt="border-color"></button></a>
                </div>
                <!-- Informations du stage -->
                <section id="info_stage" class="info bg-light p-4 rounded shadow-sm mb-5">
                    <h1 id="titreStage" class="text-primary text-center mb-4"><?php echo $stage[0]['titre']; ?></h1>
                    <img src="img/barre_separation.png" alt="Barre de séparation" class="d-block mx-auto my-3">
                    <ul class="list-unstyled">
                        <li id="categorieStage" class="mb-2"><strong>Catégorie :</strong> <?php echo $stage[0]['intitule']; ?></li>
                        <li id="periodeStage" class="mb-2"><strong>Période :</strong> <?php echo $stage[0]['date']; ?></li>
                        <li id="lieuStage" class="mb-2"><strong>Lieu :</strong> <?php echo $stage[0]['lieu']; ?></li>
                        <li id="horaireStage" class="mb-2"><strong>Horaires :</strong> De <?php echo $stage[0]['horaire_debut']; ?> à <?php echo $stage[0]['horaire_fin']; ?></li>
                        <li id="nbplaceStage" class="mb-2"><strong>Nombre de places :</strong> <?php echo $stage[0]['nb_places']; ?></li>
                        <li id="tarifStage" class="mb-2"><strong>Tarif :</strong> <?php echo $stage[0]['tarif_min']; ?> à <?php echo $stage[0]['tarif_max']; ?>€ selon le quotient familial</li>
                    </ul>
                    <img id="miniatureStage" src="<?php echo $stage[0]['miniature']; ?>" alt="Image du stage" class="img-fluid d-block mx-auto my-4">
                    <p id="descriptionStage"><strong>Description :</strong> <?php echo $stage[0]['description']; ?></p>
                </section>

                <!-- Les animateurs -->
                <section id="animateur">
                    <h2 class="text-center mb-4 h2-custom">LES ANIMATEURS</h2>
                    <div id="animateurs" class="row g-3">
                        <?php
                        $nbAnimateur=count($stage);
                        for ($i = 0; $i < $nbAnimateur; $i++) {
                            echo "<div class='col-md-4 text-center'>";
                            echo "<img src=".$stage[$i]['photo']." alt='Photo de ".$stage[$i]['prenom']."' class='img-fluid rounded-circle mb-3' style='width: 150px; height: 150px; object-fit: cover;'>";
                            echo "<h3>". $stage[$i]['prenom'] ."</h3>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </section>
            </div>

            <!-- Section pour afficher les reservations -->
            <section id="reservation" class="d-none">
                <div class="table-responsive">
                    <table class="table table-striped-columns table-rounded">
                        <thead>
                        <tr>
                            <th scope="col" class="bg-white text-center">Nom</th>
                            <th scope="col" class="bg-light text-center">Prénom</th>
                            <th scope="col" class="bg-white text-center">Âge</th>
                            <th scope="col" class="bg-white text-center">Problèmes médicaux</th>
                            <th scope="col" class="bg-white text-center">Prescription</th>
                            <th scope="col" class="bg-light text-center">Responsable légal</th>
                            <th scope="col" class="bg-white text-center">Téléphone</th>
                            <th scope="col" class="bg-light text-center">Mail</th>
                            <th scope="col" class="bg-white text-center">Etat du paiement</th>
                        </tr>
                        </thead>
                        <tbody id="resa">
                            <?php 
                            foreach ($reservations as $reservation){ ?>
                                <tr>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['nom']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['prenom']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['age']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['pb_medicaux']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['prescriptions']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['nom_prenom_RL']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['telephone']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php echo $reservation['email']; ?></td>
                                    <td class="bg-white border-0 text-center"><?php if ($reservation['etat_paiement'] == 0) { ?>
                                    <button id_stage="<?php echo $stageId ?>" class="valider_paiement" value="<?php echo $reservation['id'] ?>">Valider paiement</button>
                                    <?php } else { echo "Paiement validé"; } ?></td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Bouton pour revenir à la liste des stages -->
            <div class="text-center mt-4">
                <a href="admin_stages.php" class="btn btn-yellow">Retour à la liste des stages</a>
            </div>
        </main>
    </body>
</html>