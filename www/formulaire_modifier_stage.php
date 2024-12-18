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
    header("Location: nos_stages.php");
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


$requete='SELECT * FROM categorie;';
$res=$dbh->query($requete);
$categorie=$res->fetchALL(PDO::FETCH_ASSOC);
$res->closeCursor();

include("ressources/ressourcesCommunes.php"); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrateur - Stages</title>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <main>
            <h1>MODIFIER LE STAGE</h1>
            <form action="executable/modifierStage.php?id=<?php echo $stage[0]['id']?>" method="POST">
                <!-- Champ caché pour récupérer l'id du stage -->
                <input type="hidden" name="id" value="<?php echo $stage[0]['id']; ?>" />
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $stage[0]['titre'] ?>">
                </div>

                <div>
                    <label for="categorie">Catégorie</label>
                    <select id="categorie" name="categorie">
                    <?php
                        // Boucle à travers toutes les catégories
                        for ($i = 0; $i < count($categorie); $i++) {
                            if($categorie[$i]['id']==$stage[0]['id_categorie']){
                                $selected="selected";
                            }
                            else{
                                $selected="";
                            }
                            // Afficher l'option avec la catégorie et vérifier si elle doit être sélectionnée
                            echo("<option value='".$categorie[$i]['id']."'".$selected.">".$categorie[$i]['intitule']."</option>");
                        }
                        ?>
                    </select> 
                </div>
                
                <div>
                    <label for="image">Image</label>
                    <input type="text" id="image" name="image" value="<?php echo $stage[0]['miniature'] ?>">
                </div>

                <div>
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" value="<?php echo $stage[0]['date'] ?>">
                </div>

                <div>
                    <label for="lieu">Lieu</label>
                    <input type="text" id="lieu" name="lieu" value="<?php echo $stage[0]['lieu'] ?>">
                </div>

                <div>
                    <label for="horaires">Horaires</label>
                    Horaire début :<input type="time" id="horaire_debut" name="horaire_debut" value="<?php echo $stage[0]['horaire_debut'] ?>">
                    Horaire fin :<input type="time" id="horaire_fin" name="horaire_fin" value="<?php echo $stage[0]['horaire_fin'] ?>">
                </div>

                <div>
                    <label for="nb_place">Nombre de places</label>
                    <input type="number" id="nb_place" name="nb_place" value="<?php echo $stage[0]['nb_places'] ?>">
                </div>

                <div>
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="<?php echo $stage[0]['description'] ?>">
                </div>
                
                <div>
                    <label for="prix">Prix</label>
                    Tarif minimum :<input type="text" id="prix_min" name="prix_min" value="<?php echo $stage[0]['tarif_min'] ?>">
                    Tarif maximum :<input type="text" id="prix_max" name="prix_max" value="<?php echo $stage[0]['tarif_max'] ?>">
                </div>

                <div>
                    <label for="animateurs">Animateurs</label><br>
                    <?php
                    $requete='SELECT * FROM categorie;';
                    $res=$dbh->query($requete);
                    $categorie=$res->fetchALL(PDO::FETCH_ASSOC);
                    $res->closeCursor();
                    
                    // Récupérer tous les animateurs
                    $requete = "SELECT prenom, id FROM animateur";
                    $res = $dbh->query($requete);
                    $animateurs=$res->fetchALL(PDO::FETCH_ASSOC); 
                    $res->closeCursor();

                    // Récupérer les animateurs associés au stage
                    $requete = "SELECT id_animateur FROM anime WHERE id_stage = :stageId";
                    $res = $dbh->prepare($requete);
                    $res->bindParam(':stageId', $stageId, PDO::PARAM_INT);
                    $res->execute();
                    $animateurs_associés = $res->fetchALL(PDO::FETCH_COLUMN); 
                    $res->closeCursor();

                    // Afficher des cases à cocher pour chaque animateur
                    foreach ($animateurs as $animateur) {
                        // Vérifier si l'ID de l'animateur est dans la liste des animateurs associés, si oui checked la case
                        $checked = in_array($animateur['id'], $animateurs_associés) ? 'checked' : '';
                        echo "<input type='checkbox' name='animateurs[]' value='".$animateur['id']."' ".$checked."> ".$animateur['prenom']."<br>";
                    }
                    ?>
                </div>
                
                <button type="submit">VALIDER</button>
            </form>
            
        </main>
    </body>
</html>