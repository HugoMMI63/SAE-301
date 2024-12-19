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

include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration - Stages</title>
        <script src="js/supprimerStage.js"></script>
    </head>
    <body>
<!--Navbar-->
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
<!--Les stages-->
        <main>
        <h1 class="font colorB text-center">NOS STAGES</h1>
            <section id="liste_stage" class="container">
                <div class="row justify-content-between">
                    <a href="formulaire_ajouter_stage.php" class="col-12 col-lg-5 d-flex align-items-center justify-content-center border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center p-4">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <!-- Boucle pour afficher tous les stages -->
                    <?php foreach ($stages_data as $stage_data){

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
                    <div class="col-12 col-lg-5 border border-2 border-black rounded-4 m-4 mb-5 mt-5 text-center p-4">
                        <!-- Récupérer icon croix avec bootstrap -->
                        
                        <div class="d-flex justify-content-end">
                            <button class="suppr rounded-4 me-3 col-1 nude" value=<?php echo $stage->id?>><img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUklEQVR4nO3ZsUoDQRDG8X9pp6WPYWO7hRffILCNz+BbGLC0sRatBGtB7H0iSZOgQdhACHtncrM7swfzwbWz+ZG73HwEPB6Px9NgToAF8ApcGZx/mc5+AM4kg+6A33StgIheOmC5c/6TZNjbziBNTLeH+Lu+JAOv04fXxHQZxA9wIx08z2DWJQZnEoDvDOK21AEamOoIDYwaoiZGHVEDY4YoiTFHlMA0g5BgmkOMwTSLOAbTPOIQzGQQ28Se3Ww5JcTQNzM5xH+YSSH6VvHtM6NZzkTJPdgaFUClFK2NmuaoDP3EapYzUQ55TzSPCUe87JrFhBFv7OYwQbB2NIMJBXYnc0wouACaYUKFLVYdEyqu4mqYoNAnqmM0S9G8FubCoBTFnnI2kwx9NuoTMYP5lAy8NyxFcQ/zIhl2CjwCH+n+1c4MeE//Vp0bnO/xeDweBrMBDBFrUA6G6AoAAAAASUVORK5CYII=" alt="delete-sign--v2"></button>
                            <a href="formulaire_modifier_stage.php?id=<?php echo $stage->id ?>"><button class="modif col-1 nude" value=<?php echo $stage->id?>><img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAFP0lEQVR4nO2da4xdUxTHfzpt6dzxFtQrqYZMJkQIKUKIikSpUK3SD8IHEh9IVEoiSEPEIAgR8QyJFBEN0noURQmCCj6IpAlB69HHMN6G1pGd7MbN5M7ctc7Z57H3rF+yPt4ze//X3Y+z/+vuAcMwDMMwDMMwjInBJGAhsBzYAPwNbATWAFcBu9TdwJQ5BPgYyMaJzcC5dTc0RY4Dfuwi/vb4F1hSd4NT4kTgF6H47XFd3Q1PgZOBX3OIb0kIwOnAnwXEtyQU4EzgrwDiWxJysNBvL0OJb0lQsAj4RyjoT8BpwHuWhDBcAmwTijkEHO0/1wLetCQU4zK/f5eI/wNw+KjPuyS8YUnIxxLFPP4dMDDGcywJObhGIf5XwMwuz3NJeN1GgowbFUJ9CcwQPrcXWG1JGJsdgDsVAn0O7I8OS8I44t+jEP8zYDr5cEl4zUbC//QAjyoEWQvsSTG0I+FqEmUy8IRCiHeB3QL9bZeEV4V/122F55MYU4FnFOK/VYKztSOwQvj3N6fkrO2k6Hjmv6nuG1sG04CXhe1w9mb09AKvKMRf6RNWJu75Lwna4jzmqGkpdyAr/DRR1ZT4fJf2bCJidgXeUYj/pF+kq3baxjt7cl5ElOwBfKgQ/zG/Pa2SkwQe89dEyN7AJwrxH/R1Pk30mJ8iMqb7t1ap+Hf7t+IqOUPhMc8jIg4E1inEv7WGNp4DjAjb90ENX47czPAnlVLxH6mhjecrbM4hwZF3YzgUWK8Q38UwcGyDPeZZREI/8K1S/KqTkNdjbjwDwPc5xa8qCUU95sZyFLCloPhlJyGUx9w4jvFDNQsYoZMQ2mOOskh2xFcmDyuSEGLxu0Uh/jq/fU5S/LPbpquhCkZCFR5zbcxRvD3+7ksF2yk7CVV6zJUzV1Gh/Bswe4znlJWEHv9iJxX/I2AvImG+4gVmGDi+y/NmBV4T3PH1MqXH7I7Jo2CS3yFoTjUlhEqC1mN2hbs7ExFzFJ3LfAwKn110OnLiP6tolyvY7SMyutl1WU1JcB7zKkV7XvRGfFQcoJj7sw6xtKTpaLay/Hy5Hy3RsbSA+FmJI0ETzs2aQoT0eC80izgJy2ow+INxlvDkMKtxOhov7q/BYw7KC1066I4j9lHOxYMVjYT7YrIRO3EQsLVLJx/K+VOgwZKTcBsJcJOgo+7CjO30AW+XMB2dpxRf+txGM1lgL7oTxNG0Ao8ErcF/PYkwT9DZxWN8thUoCf3+AibJM5zVeCUJsUpwxu+q3igpCQPeGpSKfzkJcbCgcsAdfHWjlTMJGo/ZbRIuJjEkNp47nJPQp1yYH1bs/93xyAUkxlTBi9UGZfVySzkSJDGS6j1wki2f255qaQVMQrvHnByrBQte3rKNVoAkdPKYk2GmoHLMJagIrQJJcB7zKSTM7QIRXGFrHqYAJwA3AO/nEH941Fs3KS6+mwQi9Cq3s5cCTxc82YyqQjkviwRC3KsQfEugBdddQXwEE4A1AjGOHPWZfYEFwAPKiolMGG47fBgTgH7B4vupL2Ca699Y15YgeNYW3/h7oScEdwl3INLa+qxgaC5iip5pJZngWY74GXgupgrlqhbfsuIPf3XBtb7OJ1rjvAiPVyj4Vr92uDXk1Aou4YiCUCUnWYfY5v+5wh3+B9FR1WJWhfQfIEjjC78tvRDYr+7OxcDGmhferOFROtLboiZqlM7iBnQya3CUjrMMbRqivgQ4LmrANy1raFTGzQ3obNbAqJQF/uy97k5nDYrK2R24wv+Ibb3iZpEs0TAMwzAMwzAMwzAMwzAMOvEfHShJhKcuKygAAAAASUVORK5CYII=" alt="border-color"></button></a>
                        </div>
                        <h3 class="colorR my-3"><?php echo $stage->titre; ?></h3>
                        <img class="w-100 rounded-4" src="<?php echo $stage->miniature; ?>" alt="Image du stage" style="width: 300px; height: auto;">
                        <div class="d-flex justify-content-between my-3">
                            <strong>Date : <?php echo $stage->date; ?></strong>
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
                        <a class="nude" href="details_stage.php?id=<?php echo $stage->id; ?>">
                            <div class="mb-3 ms-3 me-3 mt-auto rounded-pill d-flex align-items-center justify-content-center fondJaune pe-2 ps-2 pt-3 pb-3">
                                <h6 class="mb-0 ms-3">DECOUVRIR LE STAGE</h6>
                                <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAABvUlEQVR4nO3du0okURRG4d/LmwijmbA3UvPMJgYihvoywiReMFAbgxahTUSxReyzhlofVL7pRZ2qZFcnkiRJP7Dlr8dwmOQ8yWOSRZLTJAejh5pzjPsky3fXbZJp9HBzdP5BjLfrziibtb06pj4LYpQBHr4IsvRO2ayTNYIsjbI5e6sHuFFAKsn1N6L8HT3wHBgFyChARgEyCpBRgIwCVL4S85RReMooPGUUnjIKTxmFp4zCU0bhKaPwlFF4yig8ZRSeMgpPGYWnjMJTRuEpo/CUUXjKKDxlFJ4yCk8ZhaeMwlNG4Smj8JRReMooPNNqQ2udTa7XNbw/oweeg+kbUY5HDzsXtebx9W/0oHPRSW7WCHI1etA5mDyyOCYf6v/fMbX0qxK/zxgg7Z3B0cbgaGNwtDE42hgcbQyONgZHG4OjjcHRxuBoY3C0MTjaGBxtDI42Bkcbg6ONwdHG4GhjcLQxONoYHG0MjjYGRxuDo43BYQwQY4AYA8QYIMYAMQaIMUD2/etVljPXyDh2kizc6ePYTfLsgiXLpduuLEdJHj/5uMvr3rgGRblYHV9PSU790g7nIb89eghJkqT8lhfcmbLovD1dtwAAAABJRU5ErkJggg==" alt="forward--v1">
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </main>
    </body>
</html>
