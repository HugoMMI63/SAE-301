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

// Récupérer l'ID de l'animateur depuis l'URL

if (isset($_GET['id'])) {
    $animateurId = $_GET['id'];
}
else {
    // Si l'ID n'existe pas, rediriger vers la page "index.php"

    header("Location: index.php");
    exit();
}

$resultats = $dbh->query("SELECT * FROM `animateur` WHERE id=".$animateurId.";");
$animateur = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();    // On ferme l'exécution de la requête une fois qu'elle est complétement terminée pour libérer une potentielle future requête

include("ressources/ressourcesCommunes.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration - Modifier un animateur</title>
    </head>
    <body>
        <header>
            <?php include("navbars/navbarAdmin.php"); ?>
        </header>
        <h1>Modifier l'animateur</h1>
        <form method="POST" action="executable/modifierAnimateur.php?id=<?php echo $animateurId; ?>">
            <!-- Champ caché pour récupérer l'id du stage -->

            <input type="hidden" name="id" value="<?php echo $animateurId; ?>" />
            <div>
                <label for="nom">Nom :</label>
                <input id="nom" name="nom" type="text" value="<?php echo($animateur["nom"]); ?>" required="required">
            </div>
            <br>
            <div>
                <label for="prenom">Prénom :</label>
                <input id="prenom" name="prenom" type="text" value="<?php echo($animateur["prenom"]); ?>" required="required">
            </div>
            <br>
            <div>
                <label for="age">Âge :</label>
                <input id="age" name="age" type="number" value="<?php echo($animateur["age"]); ?>" required="required">
            </div>
            <br>
            <div>
                <label for="telephone">Téléphone :</label>
                <input id="telephone" name="telephone" type="text" value="<?php echo($animateur["telephone"]); ?>" required="required">
            </div>
            <br>
            <div>
                <label for="description">Description :</label>
                <textarea id="description" name="description" required="required"><?php echo($animateur["description"]); ?></textarea>
            </div>
            <br>
            <div>
                <label for="photo">Photo :</label>
                <input id="photo" name="photo" type="url" value="<?php echo($animateur["photo"]); ?>" required="required">
            </div>
            <br>
            <div>
                <input type="submit" value="Ajouter l'animateur">
            </div>
        </form>
    </body>
</html>