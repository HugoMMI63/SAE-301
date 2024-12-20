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
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stage - <?php echo $stage[0]['titre']; ?></title>
        <script src='js/adminChangerStage.js'></script>
        <?php include("ressources/ressourcesCommunes.php"); ?>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main class="container">
            <div class="d-flex justify-content-between">
                <div >
                    <button id="stage" class="btn-warning" value="<?php echo $stage[0]['id'] ?>">Le stage</button>
                    <button id="participants" class="btn-warning" value="<?php echo $stage[0]['id'] ?>">Les participants</button>
                </div>
                <a href="formulaire_modifier_stage.php?id=<?php echo $stage[0]['id']; ?>"><button class="modif col-1" value=<?php echo $stage[0]['id']; ?>><i class="iconNoir bi bi-pencil"></i></a>
            </div>

            <div id="stageInfo">
                <div class="d-flex justify-content-between">
                    
                </div>
                <!-- Informations du stage -->
                <section id="info_stage" class="info p-4 rounded mb-5 text-center">
                    <div class="d-flex flex-column align-items-center">
                        <h1 id="titreStage" class="colorB text-center"><?php echo $stage[0]['titre']; ?></h1>
                        <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                    </div>
                    <ul class="list-unstyled">
                        <li id="categorieStage" class="mb-2"><strong>Catégorie :</strong> <?php echo $stage[0]['intitule']; ?></li>
                        <li id="periodeStage" class="mb-2"><strong>Période :</strong> <?php echo $stage[0]['date']; ?></li>
                        <li id="lieuStage" class="mb-2"><strong>Lieu :</strong> <?php echo $stage[0]['lieu']; ?></li>
                        <li id="horaireStage" class="mb-2"><strong>Horaires :</strong> De <?php echo $stage[0]['horaire_debut']; ?> à <?php echo $stage[0]['horaire_fin']; ?></li>
                        <li id="nbplaceStage" class="mb-2"><strong>Nombre de places :</strong> <?php echo $stage[0]['nb_places']; ?></li>
                        <li id="tarifStage" class="mb-2"><strong>Tarif :</strong> <?php echo $stage[0]['tarif_min']; ?> à <?php echo $stage[0]['tarif_max']; ?>€ selon le quotient familial</li>
                    </ul>
                    <img id="miniatureStage" src="<?php echo $stage[0]['miniature']; ?>" alt="Image du stage" class="col-6 text-center mx-auto my-4">
                    <p id="descriptionStage" class="col-6 text-center mx-auto my-4"><strong>Description :</strong> <?php echo $stage[0]['description']; ?></p>
                </section>

                <!-- Les animateurs -->
                <section id="animateur">
                    <div class="d-flex flex-column align-items-center">
                        <h2 class="text-center mb-1 colorB">Les animateurs</h2>
                        <img src="img/barre_separation.png" alt="Barre de séparation" class="img-fluid my-4" style="max-width: 150px;">
                    </div>
                    <div id="animateurs" class="row justify-content-center gap-3">
                        <?php
                        $nbAnimateur=count($stage);
                        for ($i = 0; $i < $nbAnimateur; $i++) {
                            echo "<div class='col-md-4 text-center'>";
                            echo "<img src=".$stage[$i]['photo']." alt='Photo de ".$stage[$i]['prenom']."' class='img-fluid rounded-circle mb-3' style='width: 150px; height: 150px; object-fit: cover;'>";
                            echo "<h3 class='colorR'>". $stage[$i]['prenom'] ."</h3>";
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
                            <th scope="col" class="bg-white text-center">Prescriptions</th>
                            <th scope="col" class="bg-light text-center">Responsable légal</th>
                            <th scope="col" class="bg-white text-center">Numéro de téléphone</th>
                            <th scope="col" class="bg-light text-center">Adresse e-mail</th>
                            <th scope="col" class="bg-white text-center">État du paiement</th>
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
            <div class="text-center my-4">
                <a href="admin_stages.php" class="btn btn-warning my-5">Retour à la liste des stages</a>
            </div>
        </main>
    </body>
</html>