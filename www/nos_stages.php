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

$api = "http://localhost/www/API/tousStage.php";
$response = file_get_contents($api);
$donnees = json_decode($response, true);

// Vérifier que l'API a retourné un statut "OK"

if ($donnees["status"] == "OK" ) {
    $stages_data = $donnees['tousStage'];
    require_once("classes/Stage.php");

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
        <title>Ka'fête ô mômes - Nos stages</title>
        <meta name="description" content="La Ka'fête ô mômes organise des stages de vacances scolaires diversifiés pendant toute l'année !">
        <meta name="keywords" content="Ka'fête ô mômes, association, stages, vacances scolaires, vacances, activités, enfants, parents, familles, Lyon">
    </head>
    <body>
        <header>
            <?php include("navbars/navbarUtilisateur.php"); ?>
        </header>
        <main>
            <h1 class="font colorB text-center">NOS STAGES</h1>
            <section class="container">
                <div class="row justify-content-between">
                    <!-- Boucle pour afficher tous les stages -->

                    <?php foreach ($stages_data as $stage_data): 
                        // Créer un objet Stage pour chaque stage
                        
                        $stage = new Stage(
                            $stage_data["id"],
                            $stage_data["miniature"],
                            $stage_data["titre"],
                            $stage_data["date"],
                            $stage_data["horaire_debut"],
                            $stage_data["horaire_fin"],
                            $stage_data["description"],
                            $stage_data["nb_places"],
                            $stage_data["lieu"],
                            $stage_data["tarif_min"],
                            $stage_data["tarif_max"],
                            $stage_data["id_categorie"]
                        );
                    ?>
                    <div class="col-12 col-lg-5 border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center">
                        <h3 class="colorR my-3"><?php echo $stage->titre; ?></h3>
                        <img class="w-100 rounded-4" src="<?php echo $stage->miniature; ?>" alt="Image du stage" style=" height: auto;">
                        <div class="d-flex justify-content-between my-3">
                            <strong >Date : <?php echo $stage->date; ?></strong>
                            <?php
                                // Récupérer le nombre de participants pour ce stage
                                $requete = 'SELECT COUNT(*) FROM reservation WHERE id_stage = ' . $stage->id;
                                $resultats = $dbh->query($requete);
        
                                // Utiliser fetchColumn() pour obtenir directement la valeur du comptage
                                $nbparticipant = $resultats->fetchColumn();
        
                                // Calculer les places restantes
                                $places_restantes = $stage->nb_places - $nbparticipant;
                            ?>
                            <strong>Places restantes : <?php echo $places_restantes; ?></strong>
                        </div>
                        <p><?php echo $stage->description; ?></p>
                        <?php if ($places_restantes > 0) {
                            echo "<a class='nude' href='details_stage.php?id=".$stage->id."'>";
                            echo "<div class='mb-3 ms-3 me-3 mt-auto rounded-pill d-flex align-items-center justify-content-center fondJaune pe-2 ps-2 pt-3 pb-3'>";
                            echo "<h6 class='mb-0 ms-3'>DECOUVRIR LE STAGE</h6>";
                            echo "<img width='25' height='25' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAABvUlEQVR4nO3du0okURRG4d/LmwijmbA3UvPMJgYihvoywiReMFAbgxahTUSxReyzhlofVL7pRZ2qZFcnkiRJP7Dlr8dwmOQ8yWOSRZLTJAejh5pzjPsky3fXbZJp9HBzdP5BjLfrziibtb06pj4LYpQBHr4IsvRO2ayTNYIsjbI5e6sHuFFAKsn1N6L8HT3wHBgFyChARgEyCpBRgIwCVL4S85RReMooPGUUnjIKTxmFp4zCU0bhKaPwlFF4yig8ZRSeMgpPGYWnjMJTRuEpo/CUUXjKKDxlFJ4yCk8ZhaeMwlNG4Smj8JRReMooPNNqQ2udTa7XNbw/oweeg+kbUY5HDzsXtebx9W/0oHPRSW7WCHI1etA5mDyyOCYf6v/fMbX0qxK/zxgg7Z3B0cbgaGNwtDE42hgcbQyONgZHG4OjjcHRxuBoY3C0MTjaGBxtDI42Bkcbg6ONwdHG4GhjcLQxONoYHG0MjjYGRxuDo43BYQwQY4AYA8QYIMYAMQaIMUD2/etVljPXyDh2kizc6ePYTfLsgiXLpduuLEdJHj/5uMvr3rgGRblYHV9PSU790g7nIb89eghJkqT8lhfcmbLovD1dtwAAAABJRU5ErkJggg==' alt='forward--v1'>";
                            echo "</div>";
                            echo "</a>";
                            } else { 
                            echo "<p>Ce stage est complet.</p>";
                        }?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
        <?php include("navbars/footer.php"); ?>
    </body>
</html>
